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
        Schema::create('periode', function (Blueprint $table) {
            $table->smallInteger('id',9)->primary();
            $table->string('semester')->nullable(false)->default('Ganjil')->comment('Ganjil or Genap');
            $table->string('tahun_akademik');
            $table->timestamps();
        });

        DB::table('periode')->insert([
            [
                'id' => '1',
                'semester' => 'Ganjil',
                'tahun_akademik' => '2024/2025',
            ],
            [
                'id' => '2',
                'semester' => 'Genap',
                'tahun_akademik' => '2024/2025',
            ],

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periode');
    }
};
