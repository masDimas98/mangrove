<?php

namespace App\Http\Controllers;

use App\Models\LahanModel as lahan;
use App\Models\DesaModel as desa;
use App\Models\KecamatanModel as kecamatan;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LahanController extends Controller
{
    protected $menu;
    protected $iddes;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Session::get("iddes") == true) {
                $this->iddes = Session::get("iddes");
            }
            $this->menu = array(
                'linkF' => '/wilayah',
                'linkFname' => 'Wilayah',
                'linkS' => '/Lahan',
                'linkSname' => 'Lahan'
            );
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $text = app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
        $kecamatan = kecamatan::all();
        $desa = desa::all();
        if ($text == 'wilayah') {
            $data = lahan::join('desa', 'desa.iddes', '=', 'lahan.iddesa')
                ->join('kecamatan', 'kecamatan.idkec', '=', 'desa.idkec')
                ->get(['lahan.*', 'desa.namadesa', 'kecamatan.namakec']);
            return view('wilayah/lahan/lahan', ['data' => $data, 'desa' => $desa, 'kecamatan' => $kecamatan, 'menu' => $this->menu]);
        }
        $fil = desa::where('iddes', $this->iddes)->get(['iddes', 'idkec'])->first();
        $idd = $fil->iddes;
        $idk = $fil->idkec;
        $data = lahan::join('desa', 'desa.iddes', '=', 'lahan.iddesa')
            ->join('kecamatan', 'kecamatan.idkec', '=', 'desa.idkec')
            ->where('lahan.iddesa', $this->iddes)
            ->get(['lahan.*', 'desa.namadesa', 'kecamatan.namakec']);

        return view('wilayah/lahan/lahan', ['data' => $data, 'desa' => $desa, 'kecamatan' => $kecamatan, 'menu' => $this->menu, 'idd' => $idd, 'idk' => $idk,]);
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
        $this->menu += ['linkC' => '', 'linkCname' => 'Tambah Data'];
        return view('wilayah/lahan/form', ['kecamatan' => $kecamatan, 'desa' => $desa, 'menu' => $this->menu]);
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
    public function show($id, $iddes)
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
        $this->menu += ['linkC' => '', 'linkCname' => 'Ubah Data'];
        $data = lahan::join('desa', 'desa.iddes', '=', 'lahan.iddesa')
            ->where('lahan.idlahan', $id)
            ->get(['lahan.*', 'desa.idkec'])->first();
        $kecamatan = kecamatan::all();
        $desa = desa::all();
        return view('wilayah/lahan/form', ['data' => $data, 'kecamatan' => $kecamatan, 'desa' => $desa, 'menu' => $this->menu]);
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

    public function filter($idk, $idd)
    {
        $kecamatan = kecamatan::all();
        $desa = desa::all();
        if ($idk != 0) {
            if ($idd != 0) {
                $data = lahan::join('desa', 'desa.iddes', '=', 'lahan.iddesa')
                    ->join('kecamatan', 'kecamatan.idkec', '=', 'desa.idkec')
                    ->where('lahan.iddesa', $idd)
                    ->get(['lahan.*', 'desa.namadesa', 'kecamatan.namakec']);
            } else {
                $data = lahan::join('desa', 'desa.iddes', '=', 'lahan.iddesa')
                    ->join('kecamatan', 'kecamatan.idkec', '=', 'desa.idkec')
                    ->where('desa.idkec', $idk)
                    ->get(['lahan.*', 'desa.namadesa', 'kecamatan.namakec']);
            }
        } else {
            $data = lahan::join('desa', 'desa.iddes', '=', 'lahan.iddesa')
                ->join('kecamatan', 'kecamatan.idkec', '=', 'desa.idkec')
                ->get(['lahan.*', 'desa.namadesa', 'kecamatan.namakec']);
        }
        return view('wilayah/lahan/lahan', ['data' => $data, 'desa' => $desa, 'kecamatan' => $kecamatan, 'idd' => $idd, 'idk' => $idk, 'menu' => $this->menu]);
    }
}
