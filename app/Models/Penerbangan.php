<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penerbangan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'no',
        'kode',
        'kota',
        'no_penerbangan',
        'jadwal_berangkat',
        'jadwal_kedatangan',
        'harga',
        'kapasitas',
        'maskapai_id',
    ];

    public function tikets()
    {
        return $this->hasMany(Tiket::class, 'penerbangan_id');
    }

    public function bandaras()
    {
        return $this->belongsToMany(Bandara::class, 'bandara_penerbangans', 'penerbangan_id', 'bandara_id')->withTimestamps()->withPivot([
            'tx_id',
            'tx_arah'
        ]);
    }

    public function maskapai()
    {
        return $this->belongsTo(Maskapai::class, 'maskapai_id');
    }

    public function bandaraPenerbangans()
    {
        return $this->hasMany(BandaraPenerbangan::class, 'penerbangan_id');
    }
}
