<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barangkeluar extends Model
{
    protected $fillable = [
        'nama',
        'jumlah',
        'ukuran',
        'foto',
        'tanggal_masuk',
        'harga',
    ];

    protected $casts = [
        'jumlah' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
