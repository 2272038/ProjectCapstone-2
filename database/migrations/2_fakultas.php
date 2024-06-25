<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fakultas', function (Blueprint $table) {
            $table->smallInteger('id')->primary();
            $table->string('nama_fakultas');
            $table->timestamps();
        });

        DB::table('fakultas')->insert([
            ['id' => '0',
                'nama_fakultas' => 'Admin'],
            ['id' => '1',
                'nama_fakultas' => 'Kedokteran'],
            ['id' => '2',
                'nama_fakultas' => 'Kedokteran Gigi'],
            ['id' => '3',
                'nama_fakultas' => 'Psikologi'],
            ['id' => '4',
                'nama_fakultas' => 'Teknologi dan Rekayasa Cerdas'],
            ['id' => '5',
                'nama_fakultas' => 'Humaniora dan Industri Kreatif'],
            ['id' => '6',
                'nama_fakultas' => 'Hukum dan Bisnis Digital']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fakultas');
    }
};
