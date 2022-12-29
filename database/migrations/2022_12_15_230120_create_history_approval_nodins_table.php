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
        Schema::dropIfExists('history_approval_nodins');
        Schema::create('history_approval_nodins', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('pemeriksa_nodin_id');
            $table->string('keterangan');
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_approval_nodins');
    }
};
