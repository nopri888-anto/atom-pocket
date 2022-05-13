@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1 class="h3 mb-4 text-gray-800">Detail Kategori</h1>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{route('kategori.index')}}" type="button" class="btn btn-primary">Kelola Kategori</a>
    </div>
</div>

<div class="card-body p-0 border-all-primary">
    <!-- Nested Row within Card Body -->
    <div class="row">
        <div class="col-lg-6">
            <div class="p-5">
                <label class="form-control-user">Nama</label>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user border-bottom-secondary" id="nama" value="{{$kategori->nama}}" readonly>
                </div>
                <label class="form-control-user">Deskripsi</label>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user border-bottom-secondary" id="deskripsi" value="{{$kategori->deskripsi}}" readonly>
                </div>
                <label class="form-control-user">Status</label>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user border-bottom-secondary" id="referensi" value="{{$kategori->kategori_status->nama}}" readonly>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection