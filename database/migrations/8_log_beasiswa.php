<?php
// database/migrations/[timestamp]_create_log_beasiswa_table.php

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
        Schema::create('log_beasiswa', function (Blueprint $table) {
            $table->smallInteger('id',9)->primary();
            $table->smallInteger('beasiswa_id');
            $table->foreign('beasiswa_id')->references('id')->on('beasiswa')->onDelete('cascade');
            $table->string('diterima_oleh');
            $table->foreign('diterima_oleh')->references('nrp')->on('User')->onDelete('cascade');
            $table->string('tingkat')->comment('fakultas or prodi');
            $table->timestamp('approved_at')->nullable();
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
        Schema::dropIfExists('log_beasiswa');
    }};
