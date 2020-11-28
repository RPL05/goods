@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center py-3">
    <h4 class="text-muted">From Edit Barang Keluar</h4>
</div>
 <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-8">
        <div class="card border-0 shadow">
          <div class="card-body">
            <form action="{{ route('barangkeluar.update', $barangkeluar->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success')}}
                    </div>
                @endif
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nama Barang</label>
                            <select name="databarang_id" id="" class="form-control">
                                <option value="">Pilih Produk</option>
                                @foreach($databarangs as $databarang)
                                    <option value="{{$databarang->id}}">{{$databarang->nama_barang}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal</label>
                            <input type="date" name="tanggal" id="" value="{{ $barangkeluar->tanggal }}" class="form-control" required>
                            <span class="text-danger" id=""></span>
                        </div>
                        <div class="form-group">
                            <label for="">Images</label>
                            <input type="file" name="images" id="" value="" class="form-control" required>
                            <span class="text-danger" id=""></span>
                        </div>
                        <div class="form-group">
                            <label for="" class="mt-3">Jumlah Barang Keluar</label>
                            <input type="number" name="jumlah_barangklr" id="" value="{{ $barangkeluar->jumlah_barangklr }}" class="form-control" required>
                            <span class="text-danger" id=""></span>
                        </div>
                        <div class="mt-3 mb-3">
                            <button type="submit" class="btn btn-outline-info" >
                                Simpan Barang Keluar
                            </button>
                            <a href="{{route('barangkeluar.index')}}" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
 </div>
@endsection
