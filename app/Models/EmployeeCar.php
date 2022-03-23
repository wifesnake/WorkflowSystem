<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeCar extends Model
{
    use HasFactory;

    protected $table = 'tb_employee_car';

    protected $fillable = [
        'id',
        'car_id',
        'employee_id',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at'
    ];
}
