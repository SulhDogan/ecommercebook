<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booksells', function (Blueprint $table) {
            $table->id('BookSellID');
            $table->bigInteger('BookID');
            $table->integer('Count');
            $table->integer('Price');
            $table->bigInteger('OrderID');
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
        Schema::dropIfExists('booksells');
    }
};
