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
        Schema::create('polling_detail', function (Blueprint $table) {
            $table->string('polling_detail_id')->primary();
            $table->string('polling_id')->foreign('polling_id')->references('polling_id')->on('polling');
            $table->string('mata_kuliah_id')->foreign('mata_kuliah_id')->references('id')->on('mata_kuliah');
            $table->integer('rating');
            $table->timestamps();
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
