<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbVehicledetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_vehicledetail', function (Blueprint $table) {
            $table->id();
            $table->integer('id_vehicle');
            $table->integer('main_driver');
            $table->integer('sub_driver1');
            $table->integer('sub_driver2');
            $table->integer('sub_driver3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_vehicledetail');
    }
}
