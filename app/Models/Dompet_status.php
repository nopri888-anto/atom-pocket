<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dompet_status extends Model
{
    use HasFactory;

    protected $table = "dompet_statuses";

    protected $fillable = ['id', 'nama'];

    public function dompet()
    {
        return $this->hasOne('App\Models\Dompet', 'status_ID');
    }
}
