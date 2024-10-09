<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bandara extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'kode',
        'kota',
    ];

    public function Penerbangans(){
        return $this->belongsToMany(Maskapai::class, 'bandara_penerbangans', 'penerbangan_id', 'bandara_id')->withTimestamps()->withPivot([
            'tx_id',
            'tx_arah'
        ]);
    }
}
