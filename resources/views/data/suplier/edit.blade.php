@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-6">
        <div class="card border-0 shadow">
          <div class="card-body">
            <form action="{{ route('data.suplier.update', $suplier->id) }}" enctype="multipart/form-data" method="post">
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
                            <label for="nama_suplier">Nama Suplier</label>
                            <input type="text" name="nama_suplier" id="nama_suplier" value="{{ $suplier->nama_suplier }}" class="form-control" required>
                            <span class="text-danger" id="nama_suplier"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" id="alamat" value="{{ $suplier->alamat }}" class="form-control" required>
                            <span class="text-danger" id="alamat"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" value="{{ $suplier->email }}" class="form-control" required>
                            <span class="text-danger" id="email"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="text" name="telepon" id="telepon" value="{{ $suplier->telepon }}" class="form-control" required>
                            <span class="text-danger" id="telepon"></span>
                        </div>
                    </div>
                    <div class="px-3 py-2">
                        <button type="submit" class="btn btn-outline-info" >
                            Save
                        </button>
                        <a href="{{route('data.suplier.index')}}" class="btn btn-outline-secondary">Kembali</a>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
