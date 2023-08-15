<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('measurements', function (Blueprint $table) {
        if (!Schema::hasColumn('measurements', 'user_id')) {
            $table->unsignedBigInteger('user_id')->index()->after('id');
        }
        
        $foreignKeys = Schema::getConnection()->getDoctrineSchemaManager()->listTableForeignKeys($table->getTable());
        if (!in_array('measurements_user_id_foreign', array_column($foreignKeys, 'getName'))) {
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
        }
    });
}


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('measurements', function (Blueprint $table) {
            // Drop foreign key first
            $table->dropForeign(['user_id']);

            // Then drop the column
            $table->dropColumn('user_id');
        });
    }
}
