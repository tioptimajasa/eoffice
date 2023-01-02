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
            $table->biginteger('dari_id');
            $table->string('dari_user_id');
            $table->biginteger('kepada_id');
            $table->string('kepada_user_id');
            $table->string('sifat');
            $table->string('urgensi');
            $table->string('perihal');
            $table->string('tembusan')->nullable();
            $table->string('lampiran_nodin')->nullable();
            $table->longtext('isi');
            $table->date('tanggal');
            $table->string('nomor_surat');
            $table->integer('nomor');
            $table->string('nomor_approval')->nullable();
            $table->string('status');
            $table->string('reff')->nullable();
            $table->timestamps();
            $table->string('created_by');
            $table->string('updated_by');
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
