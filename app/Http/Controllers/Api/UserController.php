<?php

namespace App\Http\Controllers\api;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            return User::create([
                'email' => $request->input('email'),
                'password' => Hash::make(12345678),
                'theme' => false,
                'first' => false
            ]);
        } catch (Exception) {
            return response()->json([
                'error' => $e
            ], 422);
        }
    }

    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
