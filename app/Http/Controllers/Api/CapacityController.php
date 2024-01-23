<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CapacityController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $name = $request->input('name');

        return $name;
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
