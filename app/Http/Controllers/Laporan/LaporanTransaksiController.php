<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dompet;
use App\Models\Kategori;
use App\Models\Transaksi;
use App\Exports\TransaksiExport;
use Maatwebsite\Excel\Facades\Excel;


class LaporanTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transaksi = new Transaksi();
        $kategoris = Kategori::all();
        $dompets = Dompet::all();

        if (isset($_GET['buatLaporan'])) {
            if ($request->start_date || $request->end_date) {
                $datas = $transaksi->Laporan($request);
                return view('laporan.detail', compact('datas'));
            } else {
                return view('laporan.index', compact('kategoris', 'dompets'));
            }
        } elseif (isset($_GET['exportExcel'])) {
            if ($request->start_date || $request->end_date) {
                $datas = $transaksi->exportToExcel($request);
                if ($datas) {
                    return Excel::download(new TransaksiExport, 'transaksi.xlsx');
                } else {
                    return view('laporan.index', compact('kategoris', 'dompets'));
                }
            } else {
                return view('laporan.index', compact('kategoris', 'dompets'));
            }
        } else {
            return view('laporan.index', compact('kategoris', 'dompets'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
