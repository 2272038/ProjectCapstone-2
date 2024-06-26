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
        Schema::create('role', function (Blueprint $table) {
            $table->smallInteger('id')->primary();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('role')->insert([
            [    'id' => '1',
                 'name' => 'Admin',
                ],
            [    'id' => '2',
                'name' => 'Mahasiswa',
            ],
            [    'id' => '3',
                'name' => 'Prodi',
            ],
            [    'id' => '4',
                'name' => 'Fakultas',
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role');
    }
};
