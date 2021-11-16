<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPurchasesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchases_details', function (Blueprint $table) {
            $table->foreign('prod_id', 'Product_purchases_id')->references('product_id')->on('product')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('pursh_id', 'Purchases_id_details')->references('purchases_id')->on('purchases')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchases_details', function (Blueprint $table) {
            $table->dropForeign('Product_purchases_id');
            $table->dropForeign('Purchases_id_details');
        });
    }
}
