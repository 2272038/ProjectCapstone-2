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
        Schema::create('jenis_beasiswa', function (Blueprint $table) {
            $table->smallInteger('id')->primary();
            $table->string('nama-beasiswa');
            $table->timestamps();
        });

        DB::table('jenis_beasiswa')->insert([
                'id' => '1',
                'nama-beasiswa' => 'Prestasi Akademik',
        ]);

        DB::table('jenis_beasiswa')->insert([
            'id' => '2',
            'nama-beasiswa' => 'Prestasi Non-Akademik',
        ]);

        DB::table('jenis_beasiswa')->insert([
            'id' => '3',
            'nama-beasiswa' => 'Ekonomi Lemah',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_beasiswa');
    }
};
