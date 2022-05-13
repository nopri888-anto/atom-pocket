@extends('layouts.app')

@section('content')

@if (session('error'))
<div class="alert alert-error">
    {{ session('error') }}
</div>
@endif

<div class="row">
    <div class="col-md-6">
        <h1 class="h3 mb-4 text-gray-800">Edit Kategori</h1>
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
                <form method="POST" action="{{route('kategori.update',$kategori->id)}}">
                    @csrf
                    @method('PUT')
                    <label class="form-control-user">Nama</label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user border-bottom-secondary" id="nama" name="nama" value="{{$kategori->nama}}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <label class="form-control-user">Deskripsi</label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user border-bottom-secondary" id="deskripsi" name="deskripsi" value="{{$kategori->deskripsi}}">
                        @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <label class="form-control-user">Status</label>
                    <div class="form-group">
                        <select type="text" class="form-control form-control-user border-bottom-secondary" id="status" name="status" aria-describedby="status" require>
                            <option value="{{ $kategori->kategori_status->id}}">{{ $kategori->kategori_status->nama }}</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-md btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection