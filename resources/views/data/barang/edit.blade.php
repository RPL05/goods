@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-8">
        <div class="card border-0 shadow">
          <div class="card-body">
            <form action="{{ route('data.barang.update', $databarang->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success')}}
                    </div>
                @endif
                @method('PATCH')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="code_barang">Kode Barang</label>
                            <input type="text" name="code_barang" id="code_barang" value="{{ $databarang->code_barang }}" class="form-control" required>
                            <span class="text-danger" id="code_barang"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" name="nama_barang" id="nama_barang" value="{{ $databarang->nama_barang }}" class="form-control" required>
                            <span class="text-danger" id="nama_barang"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" value="{{ $databarang->tanggal }}" class="form-control" required>
                            <span class="text-danger" id="tanggal"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="images">Images</label>
                            <input type="file" name="images" id="images" value="{{ $databarang->images }}" class="form-control" required>
                            <span class="text-danger" id="images"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jumlah_barang">Jumlah Barang</label>
                            <input type="number" name="jumlah_barang" id="jumlah_barang" value="{{ $databarang->jumlah_barang }}" class="form-control" required>
                            <span class="text-danger" id="jumlah_barang"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="harga_beli">Harga Beli</label>
                            <input type="text" name="harga_beli" id="harga_beli" value="{{ $databarang->harga_beli }}" class="form-control" required>
                            <span class="text-danger" id="harga_beli"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="harga_jual">Harga Jual</label>
                            <input type="text" name="harga_jual" id="harga_jual" value="{{ $databarang->harga_jual }}" class="form-control" required>
                            <span class="text-danger" id="harga_jual"></span>
                        </div>
                    </div>
                </div>
                <div class="pt-2 mb-2">
                    <button type="submit" class="btn btn-outline-info" >
                        Save
                    </button>
                    <a href="{{route('data.barang.index')}}" class="btn btn-outline-secondary">Kembali</a>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
