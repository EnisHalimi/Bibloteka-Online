<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrisZhanrisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libris_zhanris', function (Blueprint $table) {
            $table->unsignedBigInteger('zhanri_id');
            $table->foreign('zhanri_id')->references('id')->on('zhanris');
            $table->unsignedBigInteger('libri_id');
            $table->foreign('libri_id')->references('id')->on('libris');
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
        Schema::dropIfExists('libris_zhanris');
    }
}
