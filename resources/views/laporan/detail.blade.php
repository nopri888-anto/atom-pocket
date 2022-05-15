@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1 class="h3 mb-4 text-gray-800">Laporan Transaksi</h1>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{route('laporanTransaksi.index')}}" type="button" class="btn btn-primary">Kelola Transaksi</a>
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
                        <th>Dompet</th>
                        <th>Kategori</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $key => $data)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ $data->kode }}</td>
                        <td>{{ $data->deskripsi }}</td>
                        <td>{{ $data->dompet->nama }}</td>
                        <td>{{ $data->kategori->nama }}</td>
                        <td>{{ $data->nilai }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection