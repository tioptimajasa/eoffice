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
        Schema::dropIfExists('strukturs');
        Schema::create('strukturs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_organisasi');
            $table->string('jabatan');
            $table->integer('parent_id')->nullable();
            $table->integer('kategori');
            $table->string('patern_memo');
            $table->string('patern_nota');
            $table->string('patern_surat');
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
        Schema::dropIfExists('strukturs');
    }
};
