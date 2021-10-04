<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    use HasFactory;

    protected $table = 'states';

    protected $fillable = [
        'systemcode',
        'ord_vehicle',
        'prev_state',
        'current_state',
        'formdata',
        'created_by',
        'updated_by'
    ];
}
