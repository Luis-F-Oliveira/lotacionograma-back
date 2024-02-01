<?php

namespace App\Models;

use App\Models\User;
use App\Models\Role;
use App\Models\Area;
use App\Models\Department;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staffing extends Model
{
    use HasFactory;

    protected $hidden = [
        'user_id',
        'role_id',
        'department_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function areas()
    {
        return $this->hasMany(Area::class);
    }
}
