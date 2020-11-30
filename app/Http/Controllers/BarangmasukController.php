<?php

namespace App\Http\Controllers;

use PDF;
use App\Barangmasuk;
use App\Databarang;
use App\Suplier;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class BarangmasukController extends Controller
{
    public function __construct()
    {
        $this->barangmasuk = new Barangmasuk();
    }
    public function index()
    {
        $supliers = Suplier::all();

        $databarangs = Databarang::all();

        $barangmasuks = Barangmasuk::paginate(5);

        return view('barangmasuk.index', compact('barangmasuks','databarangs','supliers'));
    }
    public function create()
    {
        $supliers = Suplier::all();

        $databarangs = Databarang::all();

        return view('barangmasuk.create', compact('databarangs','supliers'));
    }
    public function store()
    {
        $barangmasuk = Barangmasuk::create($this->validateRequest());
        $this->storeImage($barangmasuk);
        return redirect()->back()->with(['success' => 'Barang Masuk berhasil ditambahkan' ]);
    }
    private function validateRequest(){
        return tap(request()->validate([
            'databarang_id'       => 'required',
            'suplier_id'          => 'required',
            'images'              => 'required|file|image|max:5000',
            'jumlah_barangmsk'    => 'required',
            'harga_jual'          => 'required',
            'harga_beli'          => 'required',
            'total_harga'         => 'required',
        ]), function(){
            if(request()->hasFile('images')){
                request()->validate([
                    'images'  => 'required|file|image|max:5000',
                ]);
            }
        });
    }
    private function storeImage($barangmasuk){
        if(request()->has('images')){
            $barangmasuk->update([
                'images' => request()->images->store('uploads','public'),
            ]);
            $image = Image::make(public_path('storage/'. $barangmasuk->images))->fit(300,300,null, 'top-left');
            $image->save();
        }
    }
    public function edit($id)
    {
        $supliers = Suplier::all();

        $databarangs = Databarang::all();

        $barangmasuk = Barangmasuk::findOrFail($id);

        return view("barangmasuk.edit", compact(['barangmasuk','databarangs','supliers']));
    }
    public function update(Barangmasuk $barangmasuk)
    {
        $barangmasuk->update($this->validateRequest());
        $this->storeImage($barangmasuk);
        return redirect()->back()->with(['success' => 'barang masuk berhasil diedit' ]);
    }
    public function destroy(Barangmasuk $barangmasuk)
    {
        $barangmasuk->delete();
        if(\File::exists((public_path('storage/'. $barangmasuk->images))));
        {
            \File::delete(public_path('storage/'. $barangmasuk->images));
        }
        return redirect()->back();
    }
    public function rekap()
    {
        $supliers = Suplier::all();

        $databarangs = Databarang::all();

        $barangmasuks = Barangmasuk::get();

        $pdf = PDF::loadView('barangmasuk.rekap', compact('barangmasuks','databarangs','supliers'))->setPaper('a4', 'landscape');

        return $pdf->stream('rekap_laporan_barangmasuk.pdf');
    }
}
