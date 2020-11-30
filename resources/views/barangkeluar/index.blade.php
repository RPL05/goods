@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3">
                <a href="{{route('rekap.laporan-barangkeluar')}}" class="btn btn-info" style="margin-left: 987px;">Rekap Laporan</a>
            </div>
            <div class="card border-0">
                <div class="px-3 py-3">
                    <h4 class="text-muted">Data Barang Keluar</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Images</th>
                                <th>Tanggal</th>
                                <th>Jumlah Barang Keluar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barangkeluars as $barangkeluar)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                @foreach($databarangs as $databarang)
                                    <td>{{ $databarang->nama_barang }}</td>
                                @endforeach
                                <td><img src="{{asset('storage/'. $barangkeluar->images)}}" width="40px" height="40px" alt=""></td>
                                <td>{{ $barangkeluar->tanggal }}</td>
                                <td>{{ $barangkeluar->jumlah_barangklr }}</td>
                                <td>
                                    <form action="{{ route('barangkeluar.delete', $barangkeluar->id, $databarang->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('barangkeluar.edit', $barangkeluar->id, $databarang->id) }}" class="btn btn-outline-info btn-sm">Edit</a>
                                        <button class="btn btn-outline-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
