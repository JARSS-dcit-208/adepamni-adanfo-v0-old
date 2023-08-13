<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasurementsTable extends Migration
{
    public function up()
    {
        Schema::create('measurements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->unique(); // Make customer_id unique
            $table->float('height')->nullable();
            $table->float('weight')->nullable();
            $table->float('bust')->nullable();
            $table->float('waist')->nullable();
            $table->float('hips')->nullable();
            $table->float('back_waist_length')->nullable();
            $table->float('front_waist_length')->nullable();
            $table->float('shoulder_to_shoulder')->nullable();
            $table->float('chest_depth')->nullable();
            $table->float('armhole_depth')->nullable();
            $table->float('inseam')->nullable();
            $table->float('crotch_depth')->nullable();
            $table->float('neck_circumference')->nullable();
            $table->float('sleeve_length')->nullable();
            $table->float('bicep_circumference')->nullable();
            $table->float('forearm_circumference')->nullable();
            $table->float('thigh_circumference')->nullable();
            $table->float('knee_circumference')->nullable();
            $table->float('calf_circumference')->nullable();
            $table->float('ankle_circumference')->nullable();
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('measurements');
    }
}
