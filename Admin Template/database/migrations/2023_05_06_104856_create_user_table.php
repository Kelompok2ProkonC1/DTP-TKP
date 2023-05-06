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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('nama_user')->required();
            $table->string('nik_user')->required();
            $table->string('email_user')->required();
            $table->string('pass_user')->required();
            $table->string('role_user', 10)->required();
            $table->unsignedBigInteger('id_divisi')->required();
            $table->foreign('id_divisi')->references('id')->on('divisi')->onDelete('restrict');
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
        Schema::dropIfExists('user');
    }
};