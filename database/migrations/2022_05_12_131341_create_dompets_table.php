<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDompetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dompets', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('referensi');
            $table->text('deskripsi');
            $table->bigInteger('status_ID')->unsigned();
            $table->timestamps();

            $table->foreign('status_ID')->references('id')->on('dompet_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dompets');
    }
}
