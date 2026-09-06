<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::all();
        // $users = User::orderBy('id', 'desc')->get();
        // $users = User::orderBy('name', 'desc')->get();
        // $users = User::orderBy('id', 'asc')->offset(10)->get();
        // $users = User::orderBy('id', 'asc')->offset(10)->first();
        // $users = User::orderBy('id', 'asc')->where('role_id', 1)->get();
        // $users = User::orderBy('id', 'asc')->where('role_id', 1)->first();
        // $users = User::orderBy('id', 'asc')
        // ->whereIn('role_id', [2,3])
        // ->get();
        // $users = User::orderBy('id', 'asc')
        // ->select('id','name','email', 'role_id')
        // ->get();
        $users = User::join('roles as r','users.role_id', '=', 'r.id')
        ->orderBy('id', 'desc')
        ->select('users.id','users.name','users.email', 'r.name as role')
        ->paginate(5);
        // ->get();
        // dd($users);
        return view('admin.pages.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::orderBy('name','asc')->get();
        return view('admin.pages.user.create', compact('roles'));
        // return view('admin.pages.user.create', ['roles' =>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name'                  => 'required|min:3|max:100',
            'email'                 => 'required | email|unique:users,email',
            'role_id'               => 'required',
            // 'password' => 'required|min:3|max:15|confirmed',
            'password'              => 'required|min:3|max:15',
            'password_confirmation' => 'required|same:password',
        ]);
        // dd();

        
        // $user = User::create([
        //     'name'      => $request->name,
        //     'email'     => $request->email,
        //     'role_id'   => $request->role_id,
        //     'password'  => Hash::make($request->password),
        // ]);

        $user           = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->role_id  = $request->role_id;
        $user->password = Hash::make($request->password);
        $user->save();   

        // $user = false;

        if ($user->save()) {
            return redirect()
            ->route('users.index')
            ->with('success', 'User created successfully');
        } else {
            return redirect()
            ->route('users.create')
            ->with('error', 'User not created');
        }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::join('roles as r', 'users.role_id', '=', 'r.id')
                ->where('users.id',$id)
                ->select('users.id', 'users.name', 'users.email', 'r.name as role')
                ->first();
        return view('admin.pages.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = Role::orderBy('name','asc')->get();
        $user = User::find($id);
        // dd($user);
        return view('admin.pages.user.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());

        $request->validate([
            'name'                  => 'required|min:3|max:100',
            'email'                 => "required | email|unique:users,email,$id",
            'role_id'               => 'required',
        ]);

        
        // $user           = User::find($id);
        // $user->name     = $request->name;
        // $user->email    = $request->email;
        // $user->role_id  = $request->role_id;
        // $user->update();  

        $user = User::where('id',$id)
            ->update([
                'name'          => $request->name,
                'email'         => $request->email,
                'role_id'       => $request->role_id,
            ]);



        if ($user) {
            return redirect()
            ->route('users.index')
            ->with('success', 'User created successfully');
        } else {
            return redirect()
            ->route('users.create')
            ->with('error', 'User not created');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id);
        // $user = User::find($id);
        // $user->delete()
        $user = User::destroy($id);

        if ($user) {
            return redirect()
            ->route('users.index')
            ->with('success', 'User Deleted Successfully');
        } else {
            return redirect()
            ->back()
            ->with('error', 'User not Deleted');
        }

    }
}
