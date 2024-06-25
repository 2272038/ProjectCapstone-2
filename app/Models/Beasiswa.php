<?php
// app/Models/Beasiswa.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Beasiswa extends Model
{
    protected $table = 'beasiswa';

    protected $fillable = [
        'id',
        'user_id',
        'jenis_id',
        'periode_id',
        'status',
    ];

    protected $casts = [
        'status' => 'string',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'nrp');
    }

    public function jenisBeasiswa(): BelongsTo
    {
        return $this->belongsTo(JenisBeasiswa::class, 'jenis_id', 'id');
    }

    public function periode(): BelongsTo
    {
        return $this->belongsTo(Periode::class, 'periode_id', 'id');
    }
}
