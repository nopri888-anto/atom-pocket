<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'deskripsi', 'status_ID'];

    public function kategori_status()
    {
        return $this->belongsTo('App\Models\Kategori_status', 'status_ID');
    }
}
