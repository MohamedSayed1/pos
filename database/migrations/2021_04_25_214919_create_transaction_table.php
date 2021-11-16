<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->integer('transaction_id', true);
            $table->integer('session_id')->nullable()->index('Transaction_Session_id');
            $table->integer('user_id')->nullable()->index('Transaction_User_id');
            $table->float('total', 10, 0)->nullable();
            $table->tinyInteger('type')->nullable()->default(1);
            $table->float('disc', 10, 0)->default(0);
            $table->float('real_total', 10, 0)->nullable();
            $table->enum('status', ['sale', 'return', 'expenses'])->nullable()->default('sale');
            $table->text('details')->nullable();
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
        Schema::dropIfExists('transaction');
    }
}
