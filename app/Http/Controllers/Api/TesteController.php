<?php

namespace App\Http\Controllers\api;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function index()
    {
        try {
            return response()->json(['success' => 'acesso admin'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e]);
        }
    }
}
