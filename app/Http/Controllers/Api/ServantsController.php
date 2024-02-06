<?php

namespace App\Http\Controllers\api;

use Exception;
use App\Models\Servants;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServantsController extends Controller
{
    public function __construct()
    {
        $this->middleware('ability:admin,moderator')
            ->only('store', 'update', 'destroy');
    }

    public function index()
    {
        try {
            $servants = (new Servants())->GetAll();

            return response()->json([
                'data' => $servants
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
        try {
            $servant = (new Servants())->FindWithAll($id);

            return response()->json([
                'data' => $servant
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e
            ], 500);
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

    public function search(Request $request)
    {
        try {
            $servant = (new Servants())->FindWithOption(
                $request->input('option'),
                $request->input('value')
            );

            return response()->json([
                'data' => $servant
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e
            ], 500);
        }
    }
}
