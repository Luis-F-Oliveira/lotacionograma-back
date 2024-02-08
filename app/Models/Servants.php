<?php

namespace App\Models;

use App\Models\Staffing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Servants extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function GetAll()
    {
        return Staffing::with('user', 'role', 'department', 'areas')->get();
    }

    public function FindWithAll($id)
    {
        return Staffing::with('user', 'role', 'department', 'areas')->find($id);
    }

    public function FindWithColumn($fk, $id)
    {
        return Staffing::with('user', 'role', 'department', 'areas')
            ->where($fk, $id)
            ->first();
    }
}
