<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransaksiExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return [
            'tanggal',
            'kode',
            'nilai',
            'deskripsi',
            'kategori',
            'dompet',
            'status',
        ];
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Transaksi::getData();
    }
}
