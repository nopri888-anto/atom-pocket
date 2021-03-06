<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Dompet;
use Illuminate\Http\Request;
use App\Models\Dompet_status;

class DompetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dompets = Dompet::all();
        return view('master.dompet.index', compact('dompets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dompet_status = Dompet_status::all();
        return view('master.dompet.create', compact('dompet_status'));
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
            'nama' => 'required|string|min:5',
            'deskripsi' => 'string|max:100',
            'status' => 'required',
        ]);

        $dompet = Dompet::create([
            'nama' => $request->nama,
            'referensi' => $request->referensi,
            'deskripsi' => $request->deskripsi,
            'status_ID' => $request->status,
        ]);

        if ($dompet) {
            return redirect()->route('dompet.index')->with([
                'success' => 'Sukses tambah dompet baru!'
            ]);
        } else {
            return redirect()->back()->withInput()->with([
                'error' => 'Gagal tambah dompet baru!'
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
        $dompet = Dompet::find($id);
        return view('master.dompet.detail', compact('dompet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dompet = Dompet::find($id);
        return view('master.dompet.edit', compact('dompet'));
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
        $this->validate($request, [
            'nama' => 'required|string|min:5',
            'deskripsi' => 'string|max:100',
            'status' => 'required',
        ]);

        $dompet = Dompet::findOrFail($id);

        $dompet->update([
            'nama' => $request->nama,
            'referensi' => $request->referensi,
            'deskripsi' => $request->deskripsi,
            'status_ID' => $request->status,
        ]);

        if ($dompet) {
            return redirect()->route('dompet.index')->with([
                'success' => 'Sukses update dompet!'
            ]);
        } else {
            return redirect()->back()->withInput()->with([
                'error' => 'Gagal update dompet!'
            ]);
        }
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
