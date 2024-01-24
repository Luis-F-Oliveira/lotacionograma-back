<?php

namespace App\Http\Controllers\api;

use App\Models\Office;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function index()
    {
        $offices = Office::all();

        return response()->json(['data' => $offices], 200);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($office)
    {
        $office = Office::find($office);

        return response()->json(['data' => $office]);
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
