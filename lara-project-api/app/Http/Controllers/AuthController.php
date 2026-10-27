<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            'name'                  => 'required|min:3|max:100',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|min:3|max:15',
            'password_confirmation' => 'required|same:password',
        ]);


        $user           = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->role_id  = 5;
        $user->password = Hash::make($request->password);
 
        if ($user->save()) {
            return response()->json([
                'success' => 'Registration completed successsfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Registration failed. Try again later.'
            ], 500);
        }

        // return response()->json("Register works");
    }

    public function login(Request $request)
    {

        $request->validate([
            'email'                 => 'required|email',
            'password'              => 'required',
        ]);


        $result = Auth::attempt([
            'email'    => $request->email,
            'password' => $request->password
        ]);
        if($result) {
            $user = Auth::user();
            // $token = call_user_func([$user, 'createToken'], 'auth_token')->plainTextToken;
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'success' => 'Login successsfully',
                'token' => $token,
                'user' => $user
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Invalid Creadentials'
            ], 401);
        }
        // return response()->json("Login works");
    }


    public function logout(Request $request)
    {

    // Single token logout
        $request->user()->currentAccessToken()->delete();

    // All token logout
        // $request->user()->tokens()->delete();

        return response()->json("Logout works");
    }

    public function checkToken(Request $request){
        $result = Auth::guard('sanctum')->check();
        if(!$result){
            return response()->json([
                'error' => true,
                'message' => 'Token is invalid'
            ], 401);
        }else{
            $user = Auth::guard('sanctum')->user();
            return response()->json([
                'success' => true,
                'message' => 'Token is valid',
                'user' => $user
            ]);
        }
        return response()->json($result);
    }

}
