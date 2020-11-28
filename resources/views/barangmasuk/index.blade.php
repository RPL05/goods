@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                <a href="{{ route('barangmasuk.create') }}" class="btn btn-outline-info">
                        Tambah Barang Masuk
                    </a>
                </div>
                <div class="card border-0">
                    <div class="px-3 py-3">
                        <h4 class="text-muted">Data Barang Masuk</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Suplier</th>
                                    <th>Images</th>
                                    <th>Jumlah Barang Masuk</th>
                                    <th>Harga Jual</th>
                                    <th>Harga Beli</th>
                                    <th>Total Harga</th>
                                    <th>Action</th>
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
                                    <td><img src="{{asset('storage/'. $barangmasuk->images)}}" width="40px" height="40px" alt=""></td>
                                    <td>{{ $barangmasuk->jumlah_barangmsk }}</td>
                                    <td>{{ $barangmasuk->harga_jual }}</td>
                                    <td>{{ $barangmasuk->harga_beli }}</td>
                                    <td>{{ $barangmasuk->total_harga }}</td>
                                    <td>
                                        <form action="{{ route('barangmasuk.delete', $barangmasuk->id, $databarang->id, $suplier->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('barangmasuk.edit', $barangmasuk->id, $databarang->id, $suplier->id) }}" class="btn btn-outline-info btn-sm">Edit</a>
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
