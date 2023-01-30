<?php

namespace App\Http\Controllers;

use App\Models\DesaModel;
use App\Models\KecamatanModel as kecamatan;
use App\Models\LahanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class KecamatanController extends Controller
{
    protected $menu;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->menu = array(
                'linkF' => '/wilayah',
                'linkFname' => 'Wilayah',
                'linkS' => '/kecamatan',
                'linkSname' => 'Kecamatan'
            );
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response;
     */
    public function index()
    {
        $data = kecamatan::all();
        return view('wilayah/kecamatan/kecamatan', ['data' => $data, 'menu' => $this->menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->menu += ['linkC' => '', 'linkCname' => 'Tambah Data'];
        return view('wilayah/kecamatan/form', ['menu' => $this->menu]);
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
        $this->menu += ['linkC' => '', 'linkCname' => 'Ubah Data'];
        $data = kecamatan::where('idkec', $id)->first();
        return view('wilayah/kecamatan/form', ['data' => $data, 'menu' => $this->menu]);
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

    public function will()
    {
        $menu = array(
            'linkF' => '/wilayah',
            'linkFname' => 'Wilayah',
            'linkS' => '',
            'linkSname' => 'Daftar Wilayah'
        );

        $kecamatan = kecamatan::all()->count();
        $desa = DesaModel::all()->count();
        $lahan = LahanModel::all()->count();

        return view('wilayah/wilayah', ['menu' => $menu, 'kecamatan' => $kecamatan, 'desa' => $desa, 'lahan' => $lahan]);
    }

    public function detail($id)
    {
        Session::forget('idkec');
        Session::put('idkec', $id);
        return redirect('desa');
    }
}
