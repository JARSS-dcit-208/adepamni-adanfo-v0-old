<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToDesignsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('designs', function (Blueprint $table) {
        if (!Schema::hasColumn('designs', 'user_id')) {
            $table->unsignedBigInteger('user_id')->index()->after('id');
        }
        
        $foreignKeys = Schema::getConnection()->getDoctrineSchemaManager()->listTableForeignKeys($table->getTable());
        if (!in_array('designs_user_id_foreign', array_column($foreignKeys, 'getName'))) {
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
        Schema::table('designs', function (Blueprint $table) {
            // Drop foreign key first
            $table->dropForeign(['user_id']);

            // Then drop the column
            $table->dropColumn('user_id');
        });
    }
}
