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
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pengajuan')->required();
            $table->date('tanggal_verifikasi')->nullable();
            $table->string('status_pengajuan', 10)->required();
            $table->string('deskripsi_revisi')->nullable();
            $table->unsignedBigInteger('id_pelatihan')->required();
            $table->foreign('id_pelatihan')->references('id')->on('pelatihan')->onDelete('restrict');
            $table->unsignedBigInteger('id_user')->required();
            $table->foreign('id_user')->references('id')->on('user')->onDelete('restrict');
            $table->unsignedBigInteger('id_admin')->required();
            $table->foreign('id_admin')->references('id')->on('user')->onDelete('restrict');
            $table->unsignedBigInteger('id_surat')->required();
            $table->foreign('id_surat')->references('id')->on('surat')->onDelete('restrict');
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
        Schema::dropIfExists('pengajuan');
    }
};
