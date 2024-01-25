<?php

namespace App\Http\Controllers\api;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        if ($categories->isEmpty()) {
            return response()->json([
                'message' => 'Sem categorias cadastradas'
            ], 404);
        }

        return response()->json([
            'data' => $categories
        ], 200);
    }

    public function store(Request $request)
    {
        try {
            return Category::create([
                'name' => $request->input('name')
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e
            ], 422);
        }
    }

    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'message' => 'Categoria não encontrada'
            ], 404);
        }

        return response()->json([
            'data' => $category
        ], 200);
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
