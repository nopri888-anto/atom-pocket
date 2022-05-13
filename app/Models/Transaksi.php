<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'deskripsi',
        'tanggal',
        'nilai',
        'dompet_ID',
        'kategori_ID',
        'status_ID',
    ];

    public function dompet()
    {
        return $this->belongsTo('App\Models\Dompet', 'dompet_ID');
    }

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori', 'kategori_ID');
    }

    public function transaksi_status()
    {
        return $this->belongsTo('App\Models\Transaksi_status', 'status_ID');
    }
}
