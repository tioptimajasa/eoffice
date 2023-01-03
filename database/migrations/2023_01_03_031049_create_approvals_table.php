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
        Schema::dropIfExists('pemeriksa_memos');
        Schema::dropIfExists('pemeriksa_nodins');
        Schema::dropIfExists('approvals');
        Schema::create('approvals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->char('user_id');
            $table->integer('struktur_id');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('approvals');
    }
};
