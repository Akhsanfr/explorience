<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //  table likes artikel oleh user
    public function up()
    {
        Schema::create('artikel_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artikel_id')->constrained();
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('artikels_users');
    }
}
