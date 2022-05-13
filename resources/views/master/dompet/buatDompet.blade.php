@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1 class="h3 mb-4 text-gray-800">Buat Dompet</h1>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{route('dompet.index')}}" type="button" class="btn btn-primary">Kelola Dompet</a>
    </div>
</div>

<div class="card-body p-0 border-all-primary">
    <!-- Nested Row within Card Body -->
    <div class="row">
        <div class="col-lg-6">
            <div class="p-5">
                <form method="POST" action="{{route('dompet.store')}}">
                    @csrf
                    <label class="form-control-user">Nama</label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user border-bottom-secondary" id="nama" name="nama" aria-describedby="nama" placeholder="Nama" require>
                    </div>
                    <label class="form-control-user">Deskripsi</label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user border-bottom-secondary" id="deskripsi" name="deskripsi" aria-describedby="deskripsi" placeholder="Deskripsi" require>
                    </div>
                    <label class="form-control-user">Refrensi</label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user border-bottom-secondary" id="referensi" name="referensi" aria-describedby="referensi" placeholder="Referensi">
                    </div>
                    <label class="form-control-user">Status</label>
                    <div class="form-group">
                        <select type="text" class="form-control form-control-user border-bottom-secondary" id="status" name="status" aria-describedby="status" require>
                            @foreach ($dompet_status as $ds )
                            <option value="{{ $ds->id }}">{{ $ds->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection