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
        Schema::create('books', function (Blueprint $table) {
            $table->id('BookID');
            $table->string('BookName');
            $table->string('BookInfo');
            $table->integer('BookCount');
            $table->integer('BookPage');
            $table->string('BookLanguage');
            $table->char('BookYear','4');
            $table->integer('BookPrice');
            $table->string('BookPicture');
            $table->bigInteger('AuthorID');
            $table->bigInteger('PublisherID');
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
        Schema::dropIfExists('books');
    }
};
