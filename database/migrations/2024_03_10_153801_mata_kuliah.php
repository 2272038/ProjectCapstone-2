<?php

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
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->string('id', 9)->primary();
            $table->string('nama_mata_kuliah');
            $table->string('kurikulum_id');
            $table->string('sks');
            $table->timestamps();
            $table->foreign('kurikulum_id')->references('id')->on('kurikulum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
