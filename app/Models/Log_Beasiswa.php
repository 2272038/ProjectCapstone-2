<?php
// app/Models/LogBeasiswa.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LogBeasiswa extends Model
{
    protected $table = 'log_beasiswa';

    protected $fillable = [
        'id',
        'beasiswa_id',
        'diterima_oleh',
        'tingkat',
        'approved_at',
    ];

    protected $casts = [
        'approved_at' => 'datetime',
    ];

    public function beasiswa(): BelongsTo
    {
        return $this->belongsTo(Beasiswa::class, 'beasiswa_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'diterima_oleh', 'nrp');
    }
}
