@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3">
            <a href="{{ route('data.barang.create') }}" class="btn btn-outline-info">
                    Tambah Barang
                </a>
            </div>
            <div class="card border-0">
                <div class="px-3 py-3">
                    <h4 class="text-muted">Data Barang</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Code Barang</th>
                                <th>Nama Barang</th>
                                <th>Tanggal</th>
                                <th>Images</th>
                                <th>Stock</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($databarangs as $databarang)
                            <tr>
                                <td>{{ $databarang->code_barang }}</td>
                                <td>{{ $databarang->nama_barang }}</td>
                                <td>{{ $databarang->tanggal }}</td>
                                <td><img src="{{asset('storage/'. $databarang->images)}}" width="40px" height="40px" alt=""></td>
                                <td>{{ $databarang->stock }}</td>
                                <td>{{ $databarang->harga }}</td>
                                <td>
                                    <form action="{{ route('data.barang.delete', $databarang->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('data.barang.edit', $databarang->id) }}" class="btn btn-outline-info btn-sm">Edit</a>
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
