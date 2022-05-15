<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = "kategoris";
    protected $fillable = ['id', 'nama', 'deskripsi', 'status_ID'];

    public function kategori_status()
    {
        return $this->belongsTo('App\Models\Kategori_status', 'status_ID');
    }

    public function transaksi()
    {
        return $this->hasOne('App\Models\Transaksi', 'kategori_ID');
    }
}
