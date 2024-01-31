<?php

namespace App\Http\Controllers\api;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Laravel\Sanctum\PersonalAccessToken;

class UserController extends Controller
{
    public function index(Request $request)
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        try {
            $user = User::where('matriculation', $id)->first();
            if ($user) {
                return response()->json([
                    'user' => $user
                ], 200);
            }
            return response()->json([
                'error' => 'Servidor não encontrado!'
            ], 404);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e
            ], 400);
        }
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
