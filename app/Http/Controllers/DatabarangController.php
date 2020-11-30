<?php

namespace App\Http\Controllers;

use App\Databarang;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class DatabarangController extends Controller
{
    public function __construct()
    {
        $this->databarang = new Databarang();
    }
    public function index()
    {
        $databarangs = Databarang::all();
        return view('data.barang.index', compact('databarangs'));
    }
    public function create()
    {
        return view('data.barang.create');
    }
    public function store()
    {
        $databarang = Databarang::create($this->validateRequest());
        $this->storeImage($databarang);
        return redirect()->back()->with(['success' => 'Data Barang berhasil ditambahkan' ]);
    }
    private function validateRequest(){
        return tap(request()->validate([
            'code_barang'        => 'required',
            'nama_barang'        => 'required',
            'tanggal'            => 'required',
            'images'             => 'required|file|image|max:5000',
            'stock'              => 'required',
            'harga'              => 'required',
        ]), function(){
            if(request()->hasFile('images')){
                request()->validate([
                    'images'  => 'required|file|image|max:5000',
                ]);
            }
        });
    }
    private function storeImage($databarang){
        if(request()->has('images')){
            $databarang->update([
                'images' => request()->images->store('uploads','public'),
            ]);
            $image = Image::make(public_path('storage/'. $databarang->images))->fit(300,300,null, 'top-left');
            $image->save();
        }
    }
    public function edit($id)
    {
        $databarang = Databarang::findOrFail($id);
        return view("data.barang.edit", compact('databarang'));
    }
    public function update(Databarang $databarang)
    {
        $databarang->update($this->validateRequest());
        $this->storeImage($databarang);
        return redirect()->back()->with(['success' => 'data barang berhasil diedit' ]);
    }
    public function destroy(Databarang $databarang)
    {
        $databarang->delete();
        if(\File::exists((public_path('storage/'. $databarang->images))));
        {
            \File::delete(public_path('storage/'. $databarang->images));
        }
        return redirect()->back();
    }
}
