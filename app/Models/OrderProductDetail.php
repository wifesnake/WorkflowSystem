<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProductDetail extends Model
{
    use HasFactory;

    protected $table = 'ord_productdetail';

    protected $fillable = [
        'product_id',
        'order_id',
        'ismainorder',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at'
    ];
}
