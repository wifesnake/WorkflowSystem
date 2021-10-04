<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flow extends Model
{
    use HasFactory;

    protected $table = 'flows';

    protected $fillable = [
        'systemcode',
        'ord_vehicle',
        'prev_state',
        'current_state',
        'status',
        'created_by',
        'updated_by'
    ];
}
