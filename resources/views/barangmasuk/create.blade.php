@extends('layouts.app')

@section('content')
 <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-8">
        <div class="card border-0 shadow">
          <div class="card-body">
            <form action="{{ route('barangmasuk.store') }}" enctype="multipart/form-data" method="post">
                @csrf
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success')}}
                    </div>
                @endif
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
                            <label for="" class="mt-3">Suplier</label>
                            <select name="suplier_id" id="" class="form-control">
                                <option value="">Pilih Suplier</option>
                                @foreach($supliers as $suplier)
                                    <option value="{{$suplier->id}}">{{$suplier->nama_suplier}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="mt-3">Images</label>
                            <input type="file" name="images" id="" value="" class="form-control" required>
                            <span class="text-danger" id=""></span>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Barang Masuk</label>
                            <input type="text" name="jumlah_barangmsk" id="" value="" class="form-control" required>
                            <span class="text-danger" id=""></span>
                        </div>
                        <div class="form-group">
                            <label for="">Total Harga</label>
                            <input type="number" name="total_harga" id="" value="" class="form-control" required>
                            <span class="text-danger" id=""></span>
                        </div>
                        <div class="mt-3 mb-3">
                            <button type="submit" class="btn btn-outline-info" >
                                Tambah Barang Masuk
                            </button>
                            <a href="{{route('barangmasuk.index')}}" class="btn btn-outline-secondary">Cancel</a>
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
