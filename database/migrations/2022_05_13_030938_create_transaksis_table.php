<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->text('deskripsi');
            $table->string('tanggal');
            $table->string('nilai');
            $table->bigInteger('dompet_ID')->unsigned();
            $table->bigInteger('kategori_ID')->unsigned();
            $table->bigInteger('status_ID')->unsigned();
            $table->timestamps();

            $table->foreign('dompet_ID')->references('id')->on('dompets');
            $table->foreign('kategori_ID')->references('id')->on('kategoris');
            $table->foreign('status_ID')->references('id')->on('transaksi_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
