<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = "employees";

    protected $fillable = [
        "titlename",
        "name",
        "lastname",
        "address",
        "id_card",
        "employee_code",
        "employee_type",
        "email",
        "phone",
        "salary",
        "department",
        "created_by",
        "updated_by"
    ];
}
