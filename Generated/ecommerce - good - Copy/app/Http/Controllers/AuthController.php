<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin(){ return view('admin.pages.auth.login'); }
    public function login(Request $request){
        $credentials=$request->validate(['email'=>'required|email','password'=>'required|string']);
        if(Auth::attempt($credentials, $request->boolean('remember'))){
            $request->session()->regenerate();
            if(!Auth::user()->isAdmin()){ Auth::logout(); return back()->withErrors(['email'=>'This account does not have admin access.'])->withInput($request->only('email')); }
            return redirect()->intended(route('dashboard'))->with('success','Welcome back!');
        }
        return back()->withErrors(['email'=>'The provided credentials are incorrect.'])->withInput($request->only('email'));
    }
    public function showRegister(){ return view('admin.pages.auth.register'); }
    public function register(Request $request){
        $data=$request->validate(['name'=>'required|string|max:255','email'=>'required|email|max:255|unique:users','password'=>'required|string|min:8|confirmed']);
        $user=User::create(['name'=>$data['name'],'email'=>$data['email'],'password'=>$data['password'],'role'=>'customer']);
        Auth::login($user); $request->session()->regenerate(); Auth::logout();
        return redirect()->route('login')->with('success','Account created successfully. Please login with an admin account.');
    }
    public function logout(Request $request){ Auth::logout(); $request->session()->invalidate(); $request->session()->regenerateToken(); return redirect()->route('login'); }
}
