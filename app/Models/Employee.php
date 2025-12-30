<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'identification',
        'phone',
        'city_id',
        'department_id',
        'address',
    ];

    /* ======================
     | Relaciones
     ====================== */

    // Jefe
    public function boss()
    {
        return $this->belongsTo(Employee::class, 'boss_id');
    }

    // Subordinados
    public function subordinates()
    {
        return $this->hasMany(Employee::class, 'boss_id');
    }
}
