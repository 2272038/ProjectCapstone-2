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
            $table->id();
            $table->string('polling_id');
            $table->string('matakuliah_id');
            $table->UnsignedBigInteger('user_id');
            $table->foreign('polling_id')->references('id')->on('polling');
            $table->foreign('matakuliah_id')->references('id')->on('mata_kuliah');
            $table->foreign('user_id')->references('id')->on('user');
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
