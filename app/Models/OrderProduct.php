<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table = 'ord_product';

    protected $fillable = [
        'product_id',
        'car_id',
        'employee_code',
        'pickup_date',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at'
    ];
}
