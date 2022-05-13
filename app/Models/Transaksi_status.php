<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_status extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function transaksi()
    {
        return $this->hasOne('App\Models\Transaksi', 'status_ID');
    }
}
