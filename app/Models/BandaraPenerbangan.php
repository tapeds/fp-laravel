<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BandaraPenerbangan extends Model
{
    use HasFactory;

    protected $table = 'bandara_penerbangans';

    protected $fillable = [
        'penerbangan_id',
        'bandara_id',
        'tx_id',
        'tx_arah',
    ];

    public function penerbangan()
    {
        return $this->belongsTo(Penerbangan::class, 'penerbangan_id');
    }

    public function bandara()
    {
        return $this->belongsTo(Bandara::class, 'bandara_id');
    }
}
