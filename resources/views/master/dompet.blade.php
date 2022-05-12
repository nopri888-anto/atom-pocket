@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1 class="h3 mb-4 text-gray-800">Dompet Page</h1>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{route('dompet.create')}}" type="button" class="btn btn-primary">Buat Baru</a>
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
                        <th>No</th>
                        <th>Nama</th>
                        <th>Referensi</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dompets as $key => $dompet)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $dompet->nama }}</td>
                        <td>{{ $dompet->referensi }}</td>
                        <td>{{ $dompet->deskripsi }}</td>
                        <td>{{ $dompet->dompet_status->nama }}</td>
                        <td>
                            <a href="{{route('dompet.show', $dompet->id)}}" type="button" class="btn btn-primary">Detail</a>
                            <a href="{{route('dompet.edit', $dompet->id)}}" type="button" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection