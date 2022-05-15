@extends('layouts.app')

@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="row">
    <div class="col-md-6">
        <h1 class="h3 mb-4 text-gray-800">Dashboard Page</h1>
    </div>
    <div class="col-md-6 text-right"><button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kode</th>
                        <th>Dompet</th>
                        <th>Kategori</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksis as $key => $transaksi)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $transaksi->tanggal }}</td>
                        <td>{{ $transaksi->kode }}</td>
                        <td>{{ $transaksi->dompet->nama }}</td>
                        <td>{{ $transaksi->kategori->nama }}</td>
                        <td>{{ $transaksi->nilai }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection