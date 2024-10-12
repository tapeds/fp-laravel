<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_kursi',
        'user_id',
        'penerbangan_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function penerbangan()
    {
        return $this->belongsTo(Penerbangan::class, 'penerbangan_id');
    }

    public function passengers()
    {
        return $this->hasMany(Passenger::class, 'tiket_id');
    }
}
