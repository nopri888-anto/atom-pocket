<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class Transaksi extends Model
{
    use HasFactory;

    protected $table = "transaksis";

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

    public static function getData()
    {
        $records = DB::table('transaksis')
            ->select(
                'transaksis.tanggal',
                'transaksis.kode',
                'transaksis.nilai',
                'transaksis.deskripsi',
                'transaksis.kategori_ID',
                'dompets.nama',
                'transaksis.status_ID',
            )
            ->join('dompets', 'dompets.id', '=', 'transaksis.dompet_ID')
            ->join('kategoris', 'kategoris.id', '=', 'transaksis.kategori_ID')
            ->join('transaksi_statuses', 'transaksi_statuses.id', '=', 'transaksis.status_ID')
            ->get();

        return $records;
    }

    public function Laporan($request)
    {
        $laporan = Transaksi::whereBetween('tanggal',  [$request->start_date, $request->end_date])
            ->where('kategori_ID', "=", $request->kategori)
            ->where('dompet_ID', "=", $request->dompet)
            ->get();

        return $laporan;
    }

    public function exportToExcel(Request $request)
    {
        $export = Transaksi::whereBetween('tanggal',  [$request->start_date, $request->end_date])
            ->where('kategori_ID', "=", $request->kategori)
            ->where('dompet_ID', "=", $request->dompet)
            ->get();

        return $export;
    }
}
