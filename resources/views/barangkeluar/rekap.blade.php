@extends('layouts.cetak')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <P>
                <br>
                    <h3 class="d-flex justify-content-center">GOODS</h3>
                    <hr>
                <br>
            </P>
        </div>
        <u>
            <h4>Rekap laporan Barang Keluar</h4>
        </u>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Images</th>
                    <th>Tanggal</th>
                    <th>Jumlah Barang Keluar</th>
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
