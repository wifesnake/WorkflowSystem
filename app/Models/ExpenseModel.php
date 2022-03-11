<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseModel extends Model
{
    use HasFactory;

    protected $table = 'tb_expent';

    protected $fillable = [
        'id',
        'product_id',
        'expent_type',
        'amount',
        'remark',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at'
    ];
}
