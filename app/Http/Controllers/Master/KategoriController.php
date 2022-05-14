<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Kategori_status;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategori::all();
        return view('master.kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori_status = Kategori_status::all();
        return view('master.kategori.create', compact('kategori_status'));
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

        $kategori = Kategori::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'status_ID' => $request->status,
        ]);

        if ($kategori) {
            return redirect()->route('kategori.index')->with([
                'success' => 'Sukses tambah kategori!'
            ]);
        } else {
            return redirect()->back()->withInput()->with([
                'error' => 'Gagal tambah kategori!'
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
        $kategori = Kategori::find($id);
        return view('master.kategori.detail', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('master.kategori.edit', compact('kategori'));
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

        $kategori = Kategori::findOrFail($id);

        $kategori->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'status_ID' => $request->status,
        ]);

        if ($kategori) {
            return redirect()->route('kategori.index')->with([
                'success' => 'Sukses update kategori!'
            ]);
        } else {
            return redirect()->back()->withInput()->with([
                'error' => 'Gagal update kategori!'
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
