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
        Schema::create('pemeriksa_nodins', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('nodin_id');
            $table->char('user_id');
            $table->integer('struktur_id');
            $table->integer('urutan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemeriksa_nodins');
    }
};
