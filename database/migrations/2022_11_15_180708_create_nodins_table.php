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
        Schema::dropIfExists('nodins');
        Schema::create('nodins', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('dari_id');
            $table->string('dari_user_id');
            $table->string('kepada_id');
            $table->string('kepada_user_id');
            $table->string('sifat');
            $table->string('urgensi');
            $table->string('perihal');
            $table->string('tembusan')->nullable();
            $table->string('lampiran_nodin')->nullable();
            $table->text('isi');
            $table->date('tanggal');
            $table->string('nomor_surat');
            $table->integer('nomor');
            $table->string('status');
            $table->string('reff')->nullable();
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
        Schema::dropIfExists('nodins');
    }
};
