<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'kode',
        'kota',
    ];

    public function bandaras(){
        return $this->belongsToMany(Bandara::class, 'bandara_penerbangans', 'penerbangan_id', 'bandara_id')->withTimestamps()->withPivot([
            'tx_id',
            'tx_arah'
        ]);
    }

    public function maskapai() {
        return $this->belongsTo(Maskapai::class, 'maskapai_id');
    }

    public function bandaraPenerbangans()
    {
        return $this->hasMany(BandaraPenerbangan::class, 'penerbangan_id');
    }
}
