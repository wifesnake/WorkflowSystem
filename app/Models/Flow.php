<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flow extends Model
{
    use HasFactory;

    protected $table = 'flows';

    protected $fillable = ['ord_vehicle','prev_state','current_state','next_state','status','updated_by'];
}
