@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center py-3">
    <h4 class="text-muted">From Edit Barang Masuk</h4>
</div>
 <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-8">
        <div class="card border-0 shadow">
          <div class="card-body">
            <form action="{{ route('barangmasuk.update', $barangmasuk->id) }}" enctype="multipart/form-data" method="post">
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
                            </select
                        </div>
                        <div class="form-group">
                            <label for="" class="mt-3">Suplier</label>
                            <select name="suplier_id" id="" class="form-control">
                                <option value="">Pilih Suplier</option>
                                @foreach($supliers as $suplier)
                                    <option value="{{$suplier->id}}">{{$suplier->nama_suplier}}</option>
                                @endforeach
                            </select
                        </div>
                        <div class="form-group">
                            <label for="" class="mt-3">Images</label>
                            <input type="file" name="images" id="" value="" class="form-control" required>
                            <span class="text-danger" id=""></span>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Barang Masuk</label>
                            <input type="text" name="jumlah_barangmsk" id="" value="{{ $barangmasuk->jumlah_barangmsk }}" class="form-control" required>
                            <span class="text-danger" id=""></span>
                        </div>
                        <div class="form-group">
                            <label for="">Harga Beli</label>
                            <input type="number" name="harga_beli" id="" value="{{ $barangmasuk->harga_beli }}" class="form-control" required>
                            <span class="text-danger" id=""></span>
                        </div>
                        <div class="form-group">
                            <label for="">Harga Jual</label>
                            <input type="number" name="harga_jual" id="" value="{{ $barangmasuk->harga_jual }}" class="form-control" required>
                            <span class="text-danger" id=""></span>
                        </div>
                        <div class="form-group">
                            <label for="">Total Harga</label>
                            <input type="number" name="total_harga" id="" value="{{ $barangmasuk->total_harga }}" class="form-control" required>
                            <span class="text-danger" id=""></span>
                        </div>
                        <div class="mt-3 mb-3">
                            <button type="submit" class="btn btn-outline-info" >
                                Simpan Barang Masuk
                            </button>
                            <a href="{{route('data.barang.index')}}" class="btn btn-outline-secondary">Cancel</a>
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
