@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1 class="h3 mb-4 text-gray-800">Laporan Transaksi</h1>
    </div>
</div>

<div class="card-body p-0 border-all-primary">
    <!-- Nested Row within Card Body -->
    <form method="GET" action="{{ route('laporanTransaksi.index')}}">
        <div class="row">

            <div class="col-lg-6">
                <div class="p-5">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-control-user">Tanggal Awal</label>
                            <div class="form-group">
                                <input type="date" class="form-control" name="start_date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-control-user">Tanggal Akhir</label>
                            <div class="form-group">
                                <input type="date" class="form-control" name="end_date">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-control-user">Kategori</label>
                            <div class="form-group">
                                <select type="text" class="form-control form-control-user border-bottom-secondary" id="kategori" name="kategori" aria-describedby="kategori" require>
                                    @foreach ($kategoris as $ks )
                                    <option value="{{ $ks->id }}">{{ $ks->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-control-user">Dompet</label>
                            <div class="form-group">
                                <select type="text" class="form-control form-control-user border-bottom-secondary" id="dompet" name="dompet" aria-describedby="dompet" require>
                                    @foreach ($dompets as $ds )
                                    <option value="{{ $ds->id }}">{{ $ds->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-md btn-primary">Buat Laporan</button>
                    <a href="{{route('laporanTransaksi.create')}}" type="button" class="btn btn-success">Export Excel</a>
                </div>
            </div>

        </div>
    </form>
</div>

@endsection