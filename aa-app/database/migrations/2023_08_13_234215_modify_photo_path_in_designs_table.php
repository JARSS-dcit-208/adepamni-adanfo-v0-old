<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyPhotoPathInDesignsTable extends Migration
{
    public function up()
    {
        Schema::table('designs', function (Blueprint $table) {
            $table->string('photo_path')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('designs', function (Blueprint $table) {
            $table->string('photo_path')->change();
        });
    }
}

