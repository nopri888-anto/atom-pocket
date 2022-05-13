@extends('layouts.app')

@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="row">
    <div class="col-md-6">
        <h1 class="h3 mb-4 text-gray-800">Transaksi Masuk</h1>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{route('dompetMasuk.create')}}" type="button" class="btn btn-primary">Buat Baru</a>
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Status
        </button>
        <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Aktif</a>
            <a class="dropdown-item" href="#">Tidak Aktif</a>
        </div>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body border-right-primary border-left-primary border-bottom-primary border-top-primary shadow h-100 py-2">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Kode</th>
                        <th>Deskripsi</th>
                        <th>Kategori</th>
                        <th>Nilai</th>
                        <th>Dompet</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksis as $key => $transaksi)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $transaksi->tanggal }}</td>
                        <td>{{ $transaksi->kode }}</td>
                        <td>{{ $transaksi->deskripsi }}</td>
                        <td>{{ $transaksi->kategori->nama }}</td>
                        <td>{{ $transaksi->nilai }}</td>
                        <td>{{ $transaksi->dompet->nama }}</td>
                        <td>
                            <a href="{{route('dompetMasuk.show', $transaksi->id)}}" type="button" class="btn btn-primary">Detail</a>
                            <a href="{{route('dompetMasuk.edit', $transaksi->id)}}" type="button" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection