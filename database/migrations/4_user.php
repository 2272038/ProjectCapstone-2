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
        Schema::create('User', function (Blueprint $table) {
            $table->string('nrp', 9)->primary();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->smallInteger('role_id');
            $table->smallInteger('prodi_id')->nullable(); // Add this line
            $table->timestamps();
            $table->foreign('role_id')->references('id')->on('role');
            $table->foreign('prodi_id')->references('id')->on('prodi'); // Add this line
        });

        DB::table('user')->insert([
           [    'nrp' => '001',
                'name' => 'admin',
                'email' => 'admin@maranatha.ac.id',
                'password' => bcrypt('12345678'),
                'role_id' => 1,
                'prodi_id' =>0],
        ]);

        DB::table('user')->insert([
            [    'nrp' => '2272002',
                'name' => 'mahasiswa',
                'email' => '2272002@maranatha.ac.id',
                'password' => bcrypt('12345678'),
                'role_id' => 2,
                'prodi_id' =>405],
        ]);

        DB::table('user')->insert([
            [    'nrp' => '72003',
                'name' => 'prodi',
                'email' => '72003@maranatha.ac.id',
                'password' => bcrypt('12345678'),
                'role_id' => 3,
                'prodi_id' =>0],
        ]);

        DB::table('user')->insert([
            [    'nrp' => '72004',
                'name' => 'fakultas',
                'email' => '72004@maranatha.ac.id',
                'password' => bcrypt('12345678'),
                'role_id' => 4,
                'prodi_id' =>0],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
