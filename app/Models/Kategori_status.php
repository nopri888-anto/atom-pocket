<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_status extends Model
{
    use HasFactory;

    protected $table = "kategori_statuses";
    protected $fillable = ['id', 'nama'];

    public function kategori()
    {
        return $this->hasOne('App\Models\Kategori', 'status_ID');
    }
}
