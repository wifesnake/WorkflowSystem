<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarOrder extends Model
{
    use HasFactory;

    protected $table = 'tb_car_order';

    protected $fillable = [
        'car_id',
        'order_id',
        'status',
        'created_by',
        'updated_by'
    ];
}
