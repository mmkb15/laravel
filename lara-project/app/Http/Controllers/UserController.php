<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        // ->last();
        $users = User::join('roles as r','users.role_id', '=', 'r.id')
        ->orderBy('id', 'asc')
        ->select('users.id','users.name','users.email', 'r.name as role')
        ->paginate(1);
        // ->get();
        // dd($users);
        return view('admin.pages.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.pages.user.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.pages.user.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
