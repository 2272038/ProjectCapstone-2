<?php

// app/Models/Fakultas.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;

    protected $table = 'fakultas';

    protected $primaryKey = 'id';

    public $incrementing = false; // <--- Set to false since id is not auto-incrementing

    public $timestamps = true;

    protected $fillable = [
        'id', // <--- Include id in fillable array since it's not auto-incrementing
        'nama_fakultas',
    ];

    public function prodis()
    {
        return $this->hasMany(Prodi::class, 'id_fakultas');
    }
}
