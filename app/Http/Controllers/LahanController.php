<?php

namespace App\Http\Controllers;

use App\Models\LahanModel as lahan;
use App\Models\DesaModel as desa;
use App\Models\KecamatanModel as kecamatan;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class LahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatan = kecamatan::all();
        $desa = desa::all();
        $data = lahan::join('desa', 'desa.iddes', '=', 'lahan.iddesa')
            ->join('kecamatan', 'kecamatan.idkec', '=', 'desa.idkec')
            ->get(['lahan.*', 'desa.namadesa', 'kecamatan.namakec']);
        return view('wilayah/lahan/lahan', ['data' => $data, 'desa' => $desa, 'kecamatan' => $kecamatan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = kecamatan::all();
        $desa = desa::all();
        return view('wilayah/lahan/form', ['kecamatan' => $kecamatan, 'desa' => $desa]);
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
            'idkec' => 'required|exists:App\Models\KecamatanModel,idkec',
            'iddes' => 'required|exists:App\Models\DesaModel,iddes',
            'namalahan' => 'required',
            'namapemilik' => 'required',
            'luas' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ], [
            'idkec.required' => 'Harus Diisi.',
            'idkec.exists' => 'Pilih Salah Satu Kecamatan.',
            'iddes.required' => 'Harus Diisi.',
            'iddes.exists' => 'Pilih Salah Satu Desa.',
            'namalahan.required' => 'Harus Diisi.',
            'namapemilik.required' => 'Harus Diisi.',
            'luas.required' => 'Harus Diisi.',
            'latitude.required' => 'Harus Diisi.',
            'longitude.required' => 'Harus Diisi.',
        ]);
        $data = array(
            'iddesa' => $request->iddes,
            'namalahan' => $request->namalahan,
            'kepemilikan' => $request->namapemilik,
            'luas' => $request->luas,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'userid' => auth()->user()->id
        );
        lahan::create($data);

        Alert::success('Sukses', 'Menyimpan Data Baru');

        return redirect('lahan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kecamatan = kecamatan::all();
        $desa = desa::all();
        $data = lahan::join('desa', 'desa.iddes', '=', 'lahan.iddesa')
            ->join('kecamatan', 'kecamatan.idkec', '=', 'desa.idkec')
            ->where('lahan.iddesa', $id)
            ->get(['lahan.*', 'desa.namadesa', 'kecamatan.namakec']);
        return view('wilayah/lahan/lahan', ['data' => $data, 'desa' => $desa, 'kecamatan' => $kecamatan, 'id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = lahan::join('desa', 'desa.iddes', '=', 'lahan.iddesa')
            ->where('lahan.idlahan', $id)
            ->get(['lahan.*', 'desa.idkec'])->first();
        $kecamatan = kecamatan::all();
        $desa = desa::all();
        return view('wilayah/lahan/form', ['data' => $data, 'kecamatan' => $kecamatan, 'desa' => $desa]);
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
            'idkec' => 'required|exists:App\Models\KecamatanModel,idkec',
            'iddes' => 'required|exists:App\Models\DesaModel,iddes',
            'namalahan' => 'required',
            'namapemilik' => 'required',
            'luas' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ], [
            'idkec.required' => 'Harus Diisi.',
            'idkec.exists' => 'Pilih Salah Satu Kecamatan.',
            'iddes.required' => 'Harus Diisi.',
            'iddes.exists' => 'Pilih Salah Satu Desa.',
            'namalahan.required' => 'Harus Diisi.',
            'namapemilik.required' => 'Harus Diisi.',
            'luas.required' => 'Harus Diisi.',
            'latitude.required' => 'Harus Diisi.',
            'longitude.required' => 'Harus Diisi.',
        ]);
        $data = array(
            'iddesa' => $request->iddes,
            'namalahan' => $request->namalahan,
            'kepemilikan' => $request->namapemilik,
            'luas' => $request->luas,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'userid' => auth()->user()->id
        );
        lahan::where('idlahan', $id)->update($data);

        Alert::success('Sukses', 'Menyimpan Perubahan Data');

        return redirect('lahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = lahan::where('idlahan', $id)->delete();

        Alert::success('Sukses', 'Menghapus Data');

        return redirect('lahan');
    }
}
