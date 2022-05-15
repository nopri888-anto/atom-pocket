<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dompet extends Model
{
    use HasFactory;

    protected $table = "dompets";
    protected $fillable = ['id', 'nama', 'referensi', 'deskripsi', 'status_ID'];

    public function dompet_status()
    {
        return $this->belongsTo('App\Models\Dompet_status', 'status_ID');
    }

    public function transaksi()
    {
        return $this->hasOne('App\Models\Transaksi', 'dompet_ID');
    }
}
