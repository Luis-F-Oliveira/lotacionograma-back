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
        // Obtenha o token do cookie
    $token = $request->cookie('jwt');

    // Verifique se o token está presente
    if ($token) {
        // Busque o token de acesso pessoal correspondente ao token fornecido
        $personalAccessToken = PersonalAccessToken::findToken($token);

        // Verifique se o token de acesso pessoal foi encontrado e está ativo
        if ($personalAccessToken && !$personalAccessToken->trashed()) {
            // Obtém o usuário associado ao token
            $user = $personalAccessToken->tokenable;

            // Faça o que você precisa com o usuário
            if ($user instanceof User) {
                // O usuário está autenticado
                // Faça o que você precisa com o usuário
                return response()->json(['user' => $user], 200);
            }
        }
    }

    // O token não é válido ou o usuário não foi encontrado
    return response()->json(['message' => 'Usuário não autenticado'], 401);
        
        // try {
        //     $users = User::all();

        //     return response()->json([
        //         'data' => $users
        //     ], 200);
        // } catch (Exception $e) {
        //     return response()->json([
        //         'error' => $e
        //     ]);
        // }
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        try {
            $user = User::where('matriculation', $id)->first();

            return response()->json([
                'data' => $user
            ], 200);
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
