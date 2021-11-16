<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaction_details', function (Blueprint $table) {
            $table->foreign('pro_id', 'Product_transaction_id')->references('product_id')->on('product')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('trans_id', 'Transaction_Detils_id')->references('transaction_id')->on('transaction')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaction_details', function (Blueprint $table) {
            $table->dropForeign('Product_transaction_id');
            $table->dropForeign('Transaction_Detils_id');
        });
    }
}
