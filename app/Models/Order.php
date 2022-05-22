<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "tb_order";

    protected $fillable = [
        "order_id",
        "po",
        "cust_code",
        "to_name",
        "to_address",
        "to_phone",
        "product_type",
        "product_desc",
        "product_number",
        "m_unit",
        "L_unit",
        "weight",
        "remark",
        "requesr_car_type",
        "created_by",
        "updated_by",
        "order_remark"
    ];
}
