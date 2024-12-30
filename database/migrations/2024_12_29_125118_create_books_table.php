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
            $table->id('id_book');
            $table->string('title');
            $table->string('author');
            $table->string('isbn');
            $table->string('genre')->nullable();
            $table->string('language')->nullable();
            $table->integer('published_year')->nullable();
            $table->integer('total_copies');
            $table->integer('available_copies');
            $table->string('image')->default('no_photos_available.jpg');
            $table->timestamps();
            $table->enum('status', ['0', '1'])->default('1');
            $table->text('summary')->nullable();
            $table->text('physical_description')->nullable();
            $table->string('other_title')->nullable();



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
