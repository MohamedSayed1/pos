<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->integer('details_id', true);
            $table->integer('trans_id')->nullable()->index('Transaction_Detils_id');
            $table->integer('pro_id')->nullable()->index('Product_transaction_id');
            $table->integer('quantity')->nullable();
            $table->float('pruch_prices', 10, 0)->nullable();
            $table->float('paid', 10, 0)->nullable();
            $table->enum('status', ['sale', 'return'])->default('sale');
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
        Schema::dropIfExists('transaction_details');
    }
}
