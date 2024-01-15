<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function auth()
    {
        return Auth::user();
    }

    public function register(Request $request)
    {
        try {
            return User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password'))
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e
            ], 422);
        }   
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid Credentials!'
            ], 401);
        }

        try {
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;
    
            $cookie = cookie('jwt', $token, 60 * 24);
    
            return response()->json([
                'token' => $token,
                'user' => $user
            ])->withCookie($cookie);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        } 
    }

    public function logout()
    {
        $cookie = Cookie::forget('jwt');

        return response()->json([
            'message' => 'success'
        ], 200)->withCookie($cookie);
    }
}
