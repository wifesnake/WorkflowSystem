<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = "tb_vehicle";

    protected $fillable = [
        "id",
        "car_id",
        "regis_id",
        "car_brand",
        "car_plate",
        "isTrucktype",
        "cartype",
        "status"
    ];
}
