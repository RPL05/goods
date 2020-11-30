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
            <h4>Rekap laporan Barang Masuk</h4>
        </u>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Suplier</th>
                    <th>Images</th>
                    <th>Jumlah Barang Masuk</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barangmasuks  as $barangmasuk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                        @foreach($databarangs as $databarang)
                            <td>{{ $databarang->nama_barang }}</td>
                        @endforeach
                        @foreach($supliers as $suplier)
                            <td>{{ $suplier->nama_suplier }}</td>
                        @endforeach
                    <td><img src="{{asset('storage/'. $barangmasuk->images)}}" width="40px" height="40px" alt=""> </td>
                    <td>{{ $barangmasuk->jumlah_barangmsk }}</td>
                    <td>{{ $barangmasuk->total_harga }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
