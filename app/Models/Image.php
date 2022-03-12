<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'tb_image';

    protected $fillable = [
        'product_id',
        'image',
        'base64',
        'path',
        'status',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at'
    ];
}
