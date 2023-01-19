<?php

namespace App\Http\Controllers;

use App\Models\KecamatanModel as kecamatan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KecamatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response;
     */
    public function index()
    {
        $data = kecamatan::all();
        return view('wilayah/kecamatan/kecamatan', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wilayah/kecamatan/form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ], [
            'nama.required' => 'Harus Diisi.'
        ]);
        $data = array(
            'namakec' => $request->nama,
            'userid' => auth()->user()->id
        );
        kecamatan::create($data);

        Alert::success('Sukses', 'Menyimpan Data Baru');

        return redirect('kecamatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show(kecamatan $kecamatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = kecamatan::where('idkec', $id)->first();
        return view('wilayah/kecamatan/form', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ], [
            'nama.required' => 'Harus Diisi.'
        ]);
        $data = array(
            'namakec' => $request->nama,
            'userid' => auth()->user()->id
        );

        kecamatan::where('idkec', $id)->update($data);

        Alert::success('Sukses', 'Menyimpan Perubahan Data');

        return redirect('kecamatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = kecamatan::where('idkec', $id)->delete();

        Alert::success('Sukses', 'Menghapus Data');

        return redirect('kecamatan');
    }
}
