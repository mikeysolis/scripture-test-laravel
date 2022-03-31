<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volumes', function (Blueprint $table) {
            $table->integer('id', true)->nullable();
            $table->text('volume_title')->nullable();
            $table->text('volume_long_title')->nullable();
            $table->text('volume_subtitle')->nullable();
            $table->text('volume_short_title')->nullable();
            $table->text('volume_lds_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('volumes');
    }
}
