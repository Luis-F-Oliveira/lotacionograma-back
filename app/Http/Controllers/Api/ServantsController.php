<?php

namespace App\Http\Controllers\api;

use Exception;
use App\Models\Servants;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServantsController extends Controller
{
    public function index()
    {
        try {
            $servants = (new Servants())->GetAll();

            return response()->json([
                'servants' => $servants
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e
            ], 500);
        }
    }

    public function store(Request $request)
    {
        //
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
