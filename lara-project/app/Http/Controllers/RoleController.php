<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    
    {
        // $roles = Role::all();
        // $roles =DB::table('products')->select('name','price')->get();
        // $roles =DB::table('products as p')
        //         ->join('categories as c','p.category_id', '=', 'c.id')
        //         ->join('brands as b','p.brand_id', '=', 'b.id')
        //         ->select('p.name','c.name as category', 'b.name as brand', 'p.price')->get();
        // dd($roles);
        // $roles = DB::table('roles as r')
        //     ->join('users as u', 'r.id', '=', 'u.role_id')
        //     ->select('r.name as role')
        //     ->selectRaw('COUNT(u.id) as no_of_users')
        //     ->groupBy('role')
        //     ->get();
        
        
        // dd($roles);
        
        $roles =DB::table('roles')->orderBy('name', 'asc')->paginate();
        return view('admin.pages.role.index', compact('roles'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|unique:roles,name|min:2|max:30',
        ]);

        // $role = Role::create([
        //     'name' => $request->name,
        // ]);


        $role = DB::table('roles')
             ->insert([
                'name' => $request->name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        if($role) {
            return redirect()->route('roles.index')->with('success', 'Role created successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to create role.');
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('admin.pages.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id . '|min:2|max:30',
        ]);

        // $role->name = $request->name;
        // $role->save();

        $role = DB::table('roles')
            ->where('id', $role->id)
            ->update([
                'name' => $request->name,
                'updated_at' => now(),
            ]);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        // $role->delete();

        $role = DB::table('roles')
            ->where('id', $role->id)
            ->delete();

            if($role) {
                return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to delete role.');
            }

    }


    // Custon Method
    public function search(Request $request)
    {
    //    echo "Search Working" . $request->search;
        $roles = DB::table('roles')
            ->where('name', 'like', '%' . $request->search . '%')
            ->orderBy('name', 'asc')
            ->paginate();
            return response()->json($roles);
            // return view('admin.pages.role.index', compact('roles'));
    }










}
