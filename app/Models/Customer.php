<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = "tb_customer";

    protected $fillable = [
        "customer_id",
        "customer_name",
        "address",
        "phone",
        "customer_person_number"
    ];
}
