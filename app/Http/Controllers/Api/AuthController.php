<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\User;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function index()
    {
        try {
            $accounts = Account::with('user')->get();

            return response()->json([
                'data' => $accounts
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e
            ]);
        }
    }

    public function store(Request $request)
    {
        try {
            return Account::create([
                'user_id' => $request->input('user_id'),
                'password' => Hash::make(12345678),
                'access' => $request->input('access'),
                'theme' => false,
                'first' => false
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e
            ], 400);
        }
    }

    public function show($id)
    {
        try {
            $account = Account::with('user')->find($id);

            return response()->json([
                'data' => $account
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $account = Account::find($id);

        if (!$account) {
            return response()->json([
                'error' => 'Conta não encontrada!'
            ], 404);
        }

        try {
            $account->password = Hash::make($request->input('password'));
            $account->first = $request->input('first');
            $account->save();

            return response()->json([
                'success' => 'Senha alterada!'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e
            ], 400);
        }
    }

    public function destroy($id)
    {
        $account = Account::find($id);

        if (!$account) {
            return response()->json([
                'error' => 'Conta não encontrada!'
            ], 404);
        }

        try {
            $account->delete();

            return response()->json([
                'success' => 'Conta deletada!'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e
            ], 400);
        }
    }

    public function theme($id)
    {
        $registro = Account::find($id);
        
        if ($registro) {
            $registro->theme = !$registro->theme;
            $registro->save();
            return response(200);
        } else {
            return response()->json([
                'message' => 'Registro não encontrado'
            ], 404);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $userEmail = $credentials['email'];
        $user = User::where('email', $userEmail)->first();

        if (!$user) {
            return response()->json([
                'error' => 'Usuário não encontrado!'
            ], 404);
        }

        $userAccount = Account::where('user_id', $user->id)->first();

        if (!$userAccount || !Hash::check($credentials['password'], $userAccount->password)) {
            return response()->json([
                'error' => 'Senha incorreta!'
            ], 301);
        }

        try {
            $token = $user->createToken('token')->plainTextToken;
            $cookie = cookie('jwt', $token, 60 * 24);

            return response()->json([
                'token' => $token,
                'user' => $userAccount
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
