<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller; use App\Models\Role; use App\Models\User; use Illuminate\Http\Request; use Illuminate\Support\Facades\Auth;
class RegisteredUserController extends Controller {
 public function create(){return view('auth.register');}
 public function store(Request $request){$data=$request->validate(['name'=>'required|string|max:100','email'=>'required|email|max:150|unique:users,email','phone'=>'nullable|string|max:20','password'=>'required|string|min:8|confirmed']);$data['role_id']=Role::where('name','Customer')->value('role_id');$user=User::create($data);Auth::login($user);$request->session()->regenerate();return redirect()->route('home')->with('success','Account created successfully.');}
}
