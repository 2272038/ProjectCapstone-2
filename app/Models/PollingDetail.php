<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollingDetail extends Model
{
    use HasFactory;

    protected $table = "polling_detail";
    protected $primaryKey = "polling_detail_id";
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'polling_detail_id',
        'polling_id',
        'mata_kuliah_id',
        'rating',
    ];

}
