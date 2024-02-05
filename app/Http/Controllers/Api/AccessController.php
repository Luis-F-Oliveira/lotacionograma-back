<?php

namespace App\Http\Controllers\api;

use Exception;
use App\Models\Access;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccessController extends Controller
{
    public function __construct()
    {
        $this->middleware('ability:moderator')
             ->only('store', 'destroy', 'update');
    }

    public function index()
    {
        try {
            $accesses = Access::all();
     
            if ($accesses->isEmpty()) {
                return response()->json([
                    'message' => 'Sem niveis de acessos cadastrados'
                ], 404);
            }

            return response()->json([
                'data' => $accesses
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'error' => $e
            ]);
        }
    }

    public function store(Request $request)
    {
        if (Access::where('name', $request->input('name'))->first()) {
            return response()->json([
                'message' => 'Nivel de acesso já existente'
            ], 409);
        }

        try {
            return Access::create([
                'name' => $request->input('name')
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $access = Access::find($id);
     
            if (!$access) {
                return response()->json([
                    'message' => 'Nivel de acesso não encontrado'
                ], 404);
            }

            return response()->json([
                'data' => $access
            ], 200);
            
        } catch (Exception $e) {
            return response()->json([
                'error' => $e
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
