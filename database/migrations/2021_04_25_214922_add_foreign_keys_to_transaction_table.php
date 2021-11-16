<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaction', function (Blueprint $table) {
            $table->foreign('session_id', 'Transaction_Session_id')->references('session_id')->on('session')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('user_id', 'Transaction_User_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaction', function (Blueprint $table) {
            $table->dropForeign('Transaction_Session_id');
            $table->dropForeign('Transaction_User_id');
        });
    }
}
