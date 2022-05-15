<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_status extends Model
{
    use HasFactory;

    protected $table = "transaksi_statuses";

    protected $fillable = ['id', 'nama'];

    public function transaksi()
    {
        return $this->hasOne('App\Models\Transaksi', 'status_ID');
    }
}
