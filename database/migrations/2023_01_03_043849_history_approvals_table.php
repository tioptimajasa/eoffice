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
        Schema::create('history_approvals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('approval_id');
            $table->char('user_id');
            $table->integer('struktur_id');
            $table->string('status');
            $table->string('keterangan');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_approvals');
    }
};
