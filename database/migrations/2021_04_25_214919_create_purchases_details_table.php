<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases_details', function (Blueprint $table) {
            $table->integer('pur_id', true);
            $table->integer('pursh_id')->nullable()->index('Purchases_id_details');
            $table->integer('prod_id')->nullable()->index('Product_purchases_id');
            $table->integer('count')->nullable();
            $table->float('pruch_prices', 10, 0)->nullable();
            $table->float('prices', 10, 0)->nullable();
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
        Schema::dropIfExists('purchases_details');
    }
}
