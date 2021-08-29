<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flow extends Model
{
    use HasFactory;

    protected $table = 'flows';

    protected $fillable = ['ordno','from_state','to_state','formdata','status','updated_by'];
}
