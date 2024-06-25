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
        Schema::create('prodi', function (Blueprint $table) {
            $table->smallInteger('id')->primary();
            $table->string('nama_prodi');
            $table->smallInteger('id_fakultas');
            $table->foreign('id_fakultas')->references('id')->on('fakultas');
            $table->timestamps();
        });

        DB::table('prodi')->insert([
            // Admin
            [
                'id' => '0',
                'nama_prodi' => 'Admin',
                'id_fakultas' => '0',
            ],
            // Kedokteran
            [
                'id' => '101',
                'nama_prodi' => 'Sarjana Kedokteran',
                'id_fakultas' => '1',
            ],
            [
                'id' => '102',
                'nama_prodi' => 'Profesi Dokter',
                'id_fakultas' => '1',
            ],
            [
                'id' => '103',
                'nama_prodi' => 'Magister Kesehatan Penuaan Kulit dan Estetika',
                'id_fakultas' => '1',
            ],

            // Kedokteran Gigi
            [
                'id' => '201',
                'nama_prodi' => 'Sarjana Kedokteran Gigi',
                'id_fakultas' => '2',
            ],
            [
                'id' => '202',
                'nama_prodi' => 'Profesi Dokter Gigi',
                'id_fakultas' => '2',
            ],

            // Psikologi
            [
                'id' => '301',
                'nama_prodi' => 'Sarjana Psikologi',
                'id_fakultas' => '3',
            ],
            [
                'id' => '302',
                'nama_prodi' => 'Profesi Psikologi',
                'id_fakultas' => '3',
            ],
            [
                'id' => '303',
                'nama_prodi' => 'Magister Psikologi Sains',
                'id_fakultas' => '3',
            ],

            // Teknologi dan Rekayasa Cerdas
            [
                'id' => '401',
                'nama_prodi' => 'Sarjana Teknik Sipil',
                'id_fakultas' => '4',
            ],
            [
                'id' => '402',
                'nama_prodi' => 'Sarjana Teknik Elektro',
                'id_fakultas' => '4',
            ],
            [
                'id' => '403',
                'nama_prodi' => 'Sarjana Teknik Industri',
                'id_fakultas' => '4',
            ],
            [
                'id' => '404',
                'nama_prodi' => 'Sarjana Sistem Komputer',
                'id_fakultas' => '4',
            ],
            [
                'id' => '405',
                'nama_prodi' => 'Sarjana Teknik Informatika',
                'id_fakultas' => '4',
            ],
            [
                'id' => '406',
                'nama_prodi' => 'Sarjana Sistem Informasi',
                'id_fakultas' => '4',
            ],
            [
                'id' => '407',
                'nama_prodi' => 'Magister Teknik Sipil',
                'id_fakultas' => '4',
            ],
            [
                'id' => '408',
                'nama_prodi' => 'Magister Ilmu Komputer',
                'id_fakultas' => '4',
            ],

            // Humaniora dan Industri Kreatif
            [
                'id' => '501',
                'nama_prodi' => 'Diploma Bahasa Mandarin',
                'id_fakultas' => '5',
            ],
            [
                'id' => '502',
                'nama_prodi' => 'Diploma Seni Rupa dan Desain',
                'id_fakultas' => '5',
            ],
            [
                'id' => '503',
                'nama_prodi' => 'Sarjana Sastra Inggris',
                'id_fakultas' => '5',
            ],
            [
                'id' => '504',
                'nama_prodi' => 'Sarjana Sastra Jepang',
                'id_fakultas' => '5',
            ],
            [
                'id' => '505',
                'nama_prodi' => 'Sarjana Sastra China',
                'id_fakultas' => '5',
            ],
            [
                'id' => '506',
                'nama_prodi' => 'Sarjana Seni Rupa Murni',
                'id_fakultas' => '5',
            ],
            [
                'id' => '507',
                'nama_prodi' => 'Sarjana Desain Interior',
                'id_fakultas' => '5',
            ],
            [
                'id' => '508',
                'nama_prodi' => 'Sarjana Desain Komunikasi Visual',
                'id_fakultas' => '5',
            ],
            [
                'id' => '509',
                'nama_prodi' => 'Sarjana Arsitektur',
                'id_fakultas' => '5',
            ],

            // Hukum dan Bisnis Digital
            [
                'id' => '601',
                'nama_prodi' => 'Sarjana Ilmu Hukum',
                'id_fakultas' => '6',
            ],
            [
                'id' => '602',
                'nama_prodi' => 'Sarjana Akuntansi',
                'id_fakultas' => '6',
            ],
            [
                'id' => '603',
                'nama_prodi' => 'Sarjana Manajemen',
                'id_fakultas' => '6',
            ],
            [
                'id' => '604',
                'nama_prodi' => 'Magister Manajemen',
                'id_fakultas' => '6',
            ],
            [
                'id' => '605',
                'nama_prodi' => 'Magister Akuntansi',
                'id_fakultas' => '6',
            ],
            [
                'id' => '606',
                'nama_prodi' => 'Doktor Ilmu Manajemen',
                'id_fakultas' => '6',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodi');
    }
};
