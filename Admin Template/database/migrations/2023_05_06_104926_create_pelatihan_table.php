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
        Schema::create('pelatihan', function (Blueprint $table) {
            $table->id();
            $table->string('judul_pelatihan')->required();
            $table->string('tempat_pelatihan')->required();
            $table->string('scope_pelatihan', 20)->required();
            $table->boolean('bersertifikat')->required();
            $table->string('gambar_pelatihan')->required();
            $table->string('deskripsi_pelatihan')->required();
            $table->bigInteger('biaya_pelatihan')->required();
            $table->date('tanggal_dimulai')->required();
            $table->date('tanggal_berakhir')->nullable();
            $table->unsignedBigInteger('id_kategori')->required();
            $table->foreign('id_kategori')->references('id')->on('kategori')->onDelete('restrict');
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
        Schema::dropIfExists('pelatihan');
    }
};