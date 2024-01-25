<?php

namespace App\Http\Controllers\api;

use Exception;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('category')->get();

        if ($roles->isEmpty()) {
            return response()->json([
                'message' => 'Sem cargos cadastrados'
            ], 404);
        }

        return response()->json([
            'data' => $roles
        ], 200);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $role = Role::with('category')->find($id);

        if (!$role) {
            return response()->json([
                'message' => 'Cargo não encontrado'
            ], 404);
        }

        return response()->json([
            'data' => $role
        ]);
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
