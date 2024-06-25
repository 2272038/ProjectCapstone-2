<?php

// app/Models/JeBecontroller.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBeasiswa extends Model
{
    use HasFactory;

    protected $table = 'jenis_beasiswa';

    protected $primaryKey = 'id';

    public $incrementing = false; // <--- Set to false since id is not auto-incrementing

    public $timestamps = true;

    protected $fillable = [
        'id', // <--- Include id in fillable array since it's not auto-incrementing
        'nama_beasiswa', // <--- Note: I changed the column name to nama_beasiswa (underscore instead of hyphen)
    ];
}
