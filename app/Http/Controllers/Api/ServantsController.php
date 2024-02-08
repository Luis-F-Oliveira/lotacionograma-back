<?php

namespace App\Http\Controllers\api;

use Exception;
use App\Models\Area;
use App\Models\Servants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            if ($request->input('option') === 'areas') {
                $value = $request->input('value');
                $type = $request->input('type');

                $servantId = Area::where('name', $value)
                    ->where('type', $type)
                    ->first();

                if (!$servantId) {
                    return response()->json([
                        'message' => 'value not found'
                    ], 404);
                }

                $servant = (new Servants())->FindWithAll($servantId->staffing_id);

                return response()->json([
                    'data' => $servant
                ], 200);
            }

            $db = $request->input('option');
            $column = $request->input('column');
            $value = $request->input('value');

            $query = "SELECT id FROM $db WHERE $column = ?";

            $id = DB::select($query, [$value]);

            if (!$id) {
                return response()->json([
                    'message' => 'value not found'
                ], 404);
            }

            foreach ($id as $item) {
                switch ($db) {
                    case 'users':
                        $fk = 'user_id';
                        break;

                    case 'roles':
                        $fk = 'role_id';
                        break;

                    case 'departments':
                        $fk = 'department_id';
                        break;
                    
                    default:
                        $fk = 'user_id';
                        break;
                }

                $servant = (new Servants())->FindWithColumn($fk, $item->id);

                return response()->json([
                    'data' => $servant
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                'error' => $e
            ], 500);
        }
    }
}
