<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Transaksi;
use App\Models\Dompet;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DompetMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = Transaksi::where('status_ID', "=", 1)->get();
        return view('transaksi.DompetMasuk.index', compact('transaksis'));
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

        $transaksi = Transaksi::where('status_ID', "=", 1)
            ->count('kode');
        $formatDate = $date->year;
        if ($transaksi == 0) {
            $nourut = 1000001;
            $kode = 'WIN' . $formatDate . $nourut;
        } else {
            $transaksiTerakhir = Transaksi::all()->last();
            $urut = (int)substr($transaksiTerakhir->kode, -7) + 1;
            $kode = 'WIN' . $formatDate . $urut;
        }

        $kategori = Kategori::all();
        $dompet = Dompet::all();

        return view(
            'transaksi.DompetMasuk.create',
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
            'nilai' => '+' . $request->nilai,
            'deskripsi' => $request->deskripsi,
            'status_ID' => 1,
        ]);

        if ($transaksi) {
            return redirect()->route('dompetMasuk.index')->with([
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
        return view('transaksi.DompetMasuk.detail', compact('transaksi'));
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
