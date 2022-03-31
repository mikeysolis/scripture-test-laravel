<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->integer('id', true)->nullable();
            $table->integer('volume_id')->nullable();
            $table->text('book_title')->nullable();
            $table->text('book_long_title')->nullable();
            $table->text('book_subtitle')->nullable();
            $table->text('book_short_title')->nullable();
            $table->text('book_lds_url')->nullable();
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
}
