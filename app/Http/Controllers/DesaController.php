<?php

namespace App\Http\Controllers;

use App\Models\DesaModel as desa;
use App\Models\KecamatanModel as kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class DesaController extends Controller
{
    protected $menu;
    protected $idkec;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Session::get("idkec") == true) {
                $this->idkec = Session::get("idkec");
            }
            $this->menu = array(
                'linkF' => '/wilayah',
                'linkFname' => 'Wilayah',
                'linkS' => '/desa',
                'linkSname' => 'Desa'
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
        if ($text == 'wilayah') {
            $data = desa::join('kecamatan', 'kecamatan.idkec', '=', 'desa.idkec')
                ->get(['desa.*', 'kecamatan.namakec']);
            return view('wilayah/desa/desa', ['data' => $data, 'kecamatan' => $kecamatan, 'menu' => $this->menu]);
        }
        $data = desa::join('kecamatan', 'kecamatan.idkec', '=', 'desa.idkec')->where('desa.idkec', $this->idkec)
            ->get(['desa.*', 'kecamatan.namakec']);
        return view('wilayah/desa/desa', ['data' => $data, 'kecamatan' => $kecamatan, 'menu' => $this->menu, 'filter' => $this->idkec]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = kecamatan::all();
        $this->menu += ['linkC' => '', 'linkCname' => 'Tambah Data'];
        return view('wilayah/desa/form', ['kecamatan' => $kecamatan, 'menu' => $this->menu]);
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
            'nama' => 'required'
        ], [
            'idkec.required' => 'Harus Diisi.',
            'idkec.exists' => 'Pilih Salah Satu Kecamatan.',
            'nama.required' => 'Harus Diisi.',
        ]);
        $data = array(
            'idkec' => $request->idkec,
            'namadesa' => $request->nama,
            'userid' => auth()->user()->id
        );
        desa::create($data);

        return redirect('desa');
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
        if ($id == '0') {
            $data = desa::join('kecamatan', 'kecamatan.idkec', '=', 'desa.idkec')->get(['desa.*', 'kecamatan.namakec']);
        } else {
            $data = desa::join('kecamatan', 'kecamatan.idkec', '=', 'desa.idkec')
                ->where('desa.idkec', $id)
                ->get(['desa.*', 'kecamatan.namakec']);
        }
        return view('wilayah/desa/desa', ['data' => $data, 'kecamatan' => $kecamatan, 'filter' => $id, 'menu' => $this->menu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = desa::where('iddes', $id)->first();
        $kecamatan = kecamatan::all();
        $this->menu += ['linkC' => '', 'linkCname' => 'Ubah Data'];
        return view('wilayah/desa/form', ['data' => $data, 'kecamatan' => $kecamatan, 'menu' => $this->menu]);
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
            'nama' => 'required'
        ], [
            'idkec.required' => 'Harus Diisi.',
            'idkec.exists' => 'Pilih Salah Satu Kecamatan.',
            'nama.required' => 'Harus Diisi.',
        ]);
        $data = array(
            'idkec' => $request->idkec,
            'namadesa' => $request->nama,
            'userid' => auth()->user()->id
        );
        desa::where('iddes', $id)->update($data);

        return redirect('desa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = desa::where('iddes', $id)->delete();

        return redirect('desa');
    }

    public function detail($id)
    {
        Session::forget('iddes');
        Session::put('iddes', $id);
        return redirect('lahan');
    }
}
