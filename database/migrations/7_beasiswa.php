<?php
// database/migrations/[timestamp]_create_beasiswa_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('beasiswa', function (Blueprint $table) {
            $table->smallInteger('id',9)->primary();
            $table->string('user_id');
            $table->foreign('user_id')->references('nrp')->on('User');
            $table->smallInteger('jenis_id');
            $table->foreign('jenis_id')->references('id')->on('jenis_beasiswa');
            $table->smallInteger('periode_id');
            $table->foreign('periode_id')->references('id')->on('periode');
            $table->string('status')->default('pending')->comment('ditolak, pending, diterima');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beasiswa');
    }
};
