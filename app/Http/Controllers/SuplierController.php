<?php

namespace App\Http\Controllers;

use App\Suplier;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    public function __construct()
    {
        $this->suplier = new Suplier();
    }
    public function index()
    {
        $supliers = Suplier::all();
        return view('data.suplier.index', compact('supliers'));
    }
    public function create()
    {
        return view('data.suplier.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_suplier'  => 'required',
            'alamat'        => 'required',
            'email'         => 'required',
            'telepon'       => 'required',
        ]);

        $supliers = Suplier::create([
            'nama_suplier'   => $request->nama_suplier,
            'alamat'         => $request->alamat,
            'email'          => $request->email,
            'telepon'        => $request->telepon,
        ]);

        return redirect()->back()->with(['success' => 'data suplier berhasil ditambahkan' ]);
    }
    public function edit($id)
    {
        $suplier = Suplier::findOrFail($id);
        return view("data.suplier.edit", compact('suplier'));
    }
    public function update(Request $request, $id)
    {
        $suplier = Suplier::find($id);

        $suplier->update($request-> all());

        return redirect()->back()->with(['success' => 'data suplier berhasil diedit' ]);
    }
    public function destroy($id)
    {
        $suplier = Suplier::find($id);

        $suplier->delete($suplier-> all());

        return redirect()->back();
    }
}
