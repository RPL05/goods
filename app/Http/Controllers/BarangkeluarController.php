<?php

namespace App\Http\Controllers;

use App\Barangkeluar;
use App\Databarang;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class BarangkeluarController extends Controller
{
    public function __construct()
    {
        $this->barangkeluar = new Barangkeluar();
    }
    public function index()
    {
        $databarangs = Databarang::all();

        $barangkeluars = Barangkeluar::paginate(5);

        return view('barangkeluar.index', compact('barangkeluars','databarangs'));
    }
    public function create()
    {
        $databarangs = Databarang::all();

        return view('barangkeluar.create',compact('databarangs'));
    }
    public function store()
    {
        $barangkeluar = Barangkeluar::create($this->validateRequest());
        $this->storeImage($barangkeluar);
        return redirect()->back()->with(['success' => 'Barang Keluar berhasil ditambahkan' ]);
    }
    private function validateRequest(){
        return tap(request()->validate([
            'databarang_id'       => 'required',
            'images'              => 'required|file|image|max:5000',
            'tanggal'             => 'required',
            'jumlah_barangklr'    => 'required',
        ]), function(){
            if(request()->hasFile('images')){
                request()->validate([
                    'images'  => 'required|file|image|max:5000',
                ]);
            }
        });
    }
    private function storeImage($barangkeluar){
        if(request()->has('images')){
            $barangkeluar->update([
                'images' => request()->images->store('uploads','public'),
            ]);
            $image = Image::make(public_path('storage/'. $barangkeluar->images))->fit(300,300,null, 'top-left');
            $image->save();
        }
    }
    public function edit($id)
    {
        $databarangs = Databarang::all();

        $barangkeluar = Barangkeluar::findOrFail($id);

        return view("barangkeluar.edit", compact(['barangkeluar','databarangs']));
    }
    public function update(Barangkeluar $barangkeluar)
    {
        $barangkeluar->update($this->validateRequest());
        $this->storeImage($barangkeluar);
        return redirect()->back()->with(['success' => 'barang keluar berhasil diedit' ]);
    }
    public function destroy(Barangkeluar $barangkeluar)
    {
        $barangkeluar->delete();
        if(\File::exists((public_path('storage/'. $barangkeluar->images))));
        {
            \File::delete(public_path('storage/'. $barangkeluar->images));
        }
        return redirect()->back();
    }
}
