<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session', function (Blueprint $table) {
            $table->integer('session_id', true);
            $table->integer('num_session')->nullable();
            $table->float('opening_balance', 10, 0)->nullable();
            $table->integer('user_id_open')->nullable()->index('Created_user_id');
            $table->integer('user_id_close')->nullable()->index('close_user_id');
            $table->float('close_balance', 10, 0)->nullable();
            $table->boolean('type')->default(1);
            $table->timestamp('close_at')->nullable();
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
        Schema::dropIfExists('session');
    }
}
