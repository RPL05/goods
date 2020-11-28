@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center py-3">
    <h4 class="text-muted">From Tambah Data Barang</h4>
</div>
<div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-8">
        <div class="card border-0 shadow">
          <div class="card-body">
            <form action="{{ route('data.barang.save') }}" enctype="multipart/form-data" method="post">
                @csrf
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success')}}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="code_barang">Kode Barang</label>
                            <input type="text" name="code_barang" id="code_barang" value="0" class="form-control" required>
                            <span class="text-danger" id="code_barang"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" name="nama_barang" id="nama_barang" value="" class="form-control" required>
                            <span class="text-danger" id="nama_barang"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" value="tanggal" class="form-control" required>
                            <span class="text-danger" id="tanggal"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="images">Images</label>
                            <input type="file" name="images" id="images" value="" class="form-control" required>
                            <span class="text-danger" id="images"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jumlah_barang">Jumlah Barang</label>
                            <input type="number" name="jumlah_barang" id="jumlah_barang" value="" class="form-control" required>
                            <span class="text-danger" id="jumlah_barang"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="harga_beli">Harga Beli</label>
                            <input type="text" name="harga_beli" id="harga_beli" value="" class="form-control" required>
                            <span class="text-danger" id="harga_beli"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="harga_jual">Harga Jual</label>
                            <input type="text" name="harga_jual" id="harga_jual" value="" class="form-control" required>
                            <span class="text-danger" id="harga_jual"></span>
                        </div>
                    </div>
                </div>
                <div class="pt-2 mb-2">
                    <button type="submit" class="btn btn-outline-info" >
                        Tambah Barang
                    </button>
                    <a href="{{route('data.barang.index')}}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
