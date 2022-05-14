@extends('layouts.app')

@section('content')
@if (session('error'))
<div class="alert alert-error">
    {{ session('error') }}
</div>
@endif
<div class="row">
    <div class="col-md-6">
        <h1 class="h3 mb-4 text-gray-800">Detail Transaksi Keluar</h1>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{route('dompetMasuk.index')}}" type="button" class="btn btn-primary">Kelola Transaksi Masuk</a>
    </div>
</div>

<div class="card-body p-0 border-all-primary">
    <!-- Nested Row within Card Body -->
    <div class="row">
        <div class="col-lg-12">
            <div class="p-5">
                <div class="row">
                    <div class="col-md-3">
                        <label class="form-control-user">Kode</label>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user border-bottom-secondary" id="kode" name="kode" aria-describedby="kode" value="{{$transaksi->kode}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-control-user">Tanggal</label>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user border-bottom-secondary" id="tanggal" name="tanggal" aria-describedby="tanggal" value="{{$transaksi->tanggal}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-control-user">Kategori</label>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user border-bottom-secondary" id="kategori" name="kategori" aria-describedby="kategori" value="{{$transaksi->kategori->nama}}" readonly>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="form-control-user">Dompet</label>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user border-bottom-secondary" id="dompet" name="dompet" aria-describedby="dompet" value="{{$transaksi->dompet->nama}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="form-control-user">Nilai</label>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user border-bottom-secondary" id="nilai" name="nilai" aria-describedby="nilai" value="{{$transaksi->nilai}}" readonly>
                        </div>
                        <label class="form-control-user">Deskripsi</label>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user border-bottom-secondary" id="deskripsi" name="deskripsi" aria-describedby="deskripsi" value="{{$transaksi->deskripsi}}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection