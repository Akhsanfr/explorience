<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikels', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('judul');
            $table->string('judul_en')->nullable();
            $table->string('gambar');
            $table->text('isi');
            $table->text('isi_en')->nullable();
            $table->foreignId('kategori_id')->constrained();
            $table->enum('status_aktivasi', ['aktif', 'tidak aktif', 'ditolak'])->default('tidak aktif');
            $table->timestamps();

            $table->unsignedBigInteger('user_writer_id');
            $table->foreign('user_writer_id')->references('id')->on('users');
            $table->unsignedBigInteger('user_supervisor_id')->nullable();
            $table->foreign('user_supervisor_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artikels');
    }
}
