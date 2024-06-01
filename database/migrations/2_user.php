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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('nrp', 9);
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->smallInteger('role_id');
            $table->timestamps();
            $table->foreign('role_id')->references('id')->on('role');
        });

        DB::table('user')->insert([
           [    'nrp' => '72001',
                'name' => 'Admin',
                'email' => 'admin@maranatha.ac.id',
                'password' => bcrypt('12345678'),
                'role_id' => 1],
        ]);

        DB::table('user')->insert([
            [    'nrp' => '72002',
                'name' => 'Prodi',
                'email' => 'prodi@maranatha.ac.id',
                'password' => bcrypt('12345678'),
                'role_id' => 2],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
