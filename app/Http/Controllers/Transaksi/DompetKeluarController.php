<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use Carbon\Carbon;
use App\Models\Dompet;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;

class DompetKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $transaksis = Transaksi::where('status_ID', "=", 2)->get();
        return view('transaksi.DompetKeluar.index', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tanggal = Carbon::now()->format('Y-m-d');
        $date = Carbon::now();

        $transaksi = Transaksi::where('status_ID', "=", 2)
            ->count('kode');
        $formatDate = $date->year;
        if ($transaksi == 0) {
            $nourut = 1000001;
            $kode = 'WOUT' . $formatDate . $nourut;
        } else {
            $transaksiTerakhir = Transaksi::all()->last();
            $urut = (int)substr($transaksiTerakhir->kode, -7) + 1;
            $kode = 'WOUT' . $formatDate . $urut;
        }

        $kategori = Kategori::all();
        $dompet = Dompet::all();

        return view(
            'transaksi.DompetKeluar.create',
            compact('kategori', 'dompet', 'kode', 'tanggal')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode' => 'required|string',
            'tanggal' => 'required|string',
            'kategori' => 'required',
            'dompet' => 'required',
            'nilai' => 'required|numeric',
            'deskripsi' => 'required|max:100',
        ]);

        $transaksi = Transaksi::create([
            'kode' => $request->kode,
            'tanggal' => $request->tanggal,
            'kategori_ID' => $request->kategori,
            'dompet_ID' => $request->dompet,
            'nilai' => '-' . $request->nilai,
            'deskripsi' => $request->deskripsi,
            'status_ID' => 2,
        ]);

        if ($transaksi) {
            return redirect()->route('dompetKeluar.index')->with([
                'success' => 'Sukses tambah transaksi baru!'
            ]);
        } else {
            return redirect()->back()->withInput()->with([
                'error' => 'Gagal tambah transaksi baru!'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::find($id);
        return view('transaksi.DompetKeluar.detail', compact('transaksi'));
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
