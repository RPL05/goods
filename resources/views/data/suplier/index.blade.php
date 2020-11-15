@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3">
                <a href="{{ route('data.suplier.create') }}" class="btn btn-outline-info">
                    Tambah Suplier
                </a>
            </div>
            <div class="card border-0">
                <div class="px-3 py-3">
                    <h4 class="text-muted">Data Suplier</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Suplier</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($supliers as $suplier)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $suplier->nama_suplier }}</td>
                                <td>{{ $suplier->alamat }}</td>
                                <td>{{ $suplier->email }}</td>
                                <td>{{ $suplier->telepon }}</td>
                                <td>
                                    <a href="{{ route('data.suplier.show-formEdit', $suplier->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
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
