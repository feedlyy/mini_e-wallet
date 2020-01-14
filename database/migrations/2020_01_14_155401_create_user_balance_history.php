<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBalanceHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_balance_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_balance_id');
            $table->foreign('user_balance_id')->references('id')
                ->on('user_balance')->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('balance_before');
            $table->integer('balance_after');
            $table->string('activity');
            $table->enum('type', ['credit', 'debit']);
            $table->string('ip');
            $table->string('location');
            $table->string('user_agent');
            $table->string('author');
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
        Schema::dropIfExists('user_balance_history');
    }
}
