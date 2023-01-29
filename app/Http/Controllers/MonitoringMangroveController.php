<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\MonitoringMangroveModel as Monitoring;
use App\Models\PenanamanModel as Penanaman;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class MonitoringMangroveController extends Controller
{
    protected $idtanam;
    protected $menu;

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            if (Session::get("idtanam") == false) {
                Redirect::to('monitoringlist')->send();
            }
            $this->idtanam = Session::get('idtanam');
            $this->menu = array(
                'linkF' => '/monitoringlist',
                'linkFname' => 'Monitoring',
                'linkS' => '/monitoring',
                'linkSname' => 'Daftar Monitoring dan Evaluasi'
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
        $penanaman = Penanaman::join('mangrove', 'mangrove.idmangrove', '=', 'penanaman_mangrove.idmangrove')->where('idtanam', $this->idtanam)->get(['penanaman_mangrove.*', 'mangrove.mangrovelatin', 'mangrove.mangroveindo'])->first();
        $data = Monitoring::where('idtanam', $this->idtanam)->get();
        // dd($penanaman);
        return view('monitoring/monitoring/monitoring', ['penanaman' => $penanaman, 'data' => $data,  'menu' => $this->menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->menu += ['linkC' => '', 'linkCname' => 'Tambah Data'];
        return view('monitoring/monitoring/form', ['menu' => $this->menu]);
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
            'tglmonev' => 'required|date',
            'jmlmati' => 'required|integer',
            'jmlhidup' => 'required|integer',
            // 'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:100'
            'foto' => 'required|file|image|mimes:jpeg,png,jpg'
        ], [
            'tglmonev.required' => 'Harus Diisi.',
            'tglmonev.data' => 'Harus Diisi dengan tanggal',
            'jmlmati.required' => 'Harus Diisi.',
            'jmlmati.integer' => 'Harap Masukan Angka',
            'jmlhidup.required' => 'Harus Diisi.',
            'jmlhidup.integer' => 'Harap Masukan Angka',
            'foto.required' => 'Harus Diisi.',
            'foto.image' => 'File harus Berbentuk Image.',
            'foto.mimes' => 'Bentuk File Harus JPEG, PNG, JPG',
            // 'foto.max' => 'besar file maksimal 100kb.'
        ]);

        $file = $request->file('foto');
        $file_name = time() . '_' . $file->getClientOriginalName();
        $path = 'image/penanamanmonev';
        $file->move($path, $file_name);

        $data = array(
            'idtanam' => $this->idtanam,
            'tglmonev' => $request->tglmonev,
            'jml_mati' => $request->jmlmati,
            'jml_hidup' => $request->jmlhidup,
            'userid' => auth()->user()->id,
            'foto' => $file_name,
        );

        try {
            Monitoring::create($data);

            Alert::success('Sukses', 'Menyimpan Data Baru');

            return redirect('monitoring');
        } catch (\Throwable $th) {
            Alert::success('Error', 'Terjadi Kesalahan Saat Menyimpan Data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $data = Monitoring::where('idmonev', $id)->first();
        return view('monitoring/monitoring/form', ['menu' => $this->menu, 'data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tglmonev' => 'required|date',
            'jml_mati' => 'required|integer',
            'jml_hidup' => 'required|integer',
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:100'
        ], [
            'tglmonev.required' => 'Harus Diisi.',
            'tglmonev.data' => 'Harus Diisi dengan tanggal',
            'jml_mati.required' => 'Harus Diisi.',
            'jml_mati.integer' => 'Harap Masukan Angka',
            'jml_hidup.required' => 'Harus Diisi.',
            'jml_hidup.integer' => 'Harap Masukan Angka',
            'foto.image' => 'File harus Berbentuk Image.',
            'foto.mimes' => 'Bentuk File Harus JPEG, PNG, JPG',
            'foto.max' => 'besar file maksimal 100kb.'
        ]);

        $old = Monitoring::where('idtanam', $id)->first();

        if ($request->foto != '') {
            $file = $request->file('foto');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $path = 'image/penanamanmonev';
            if (File::exists(public_path('image/penanamanmonev/' . $old->foto))) {
                File::delete(public_path('image/penanamanmonev/' . $old->foto));
            } else {
                Alert::error('Terjadi Kesalahan', 'File Tidak Ada Pada Sistem');
                return redirect()->back();
            }
            $file->move($path, $file_name);
            $data = array(
                'idtanam' => $this->idtanam,
                'tgltanam' => $request->tgltanam,
                'jml_mati' => $request->jumlahmati,
                'jml_hidup' => $request->jumlahhidup,
                'userid' => auth()->user()->id,
                'foto' => $file_name,
            );
        } else {
            $data = array(
                'idtanam' => $this->idtanam,
                'tgltanam' => $request->tgltanam,
                'jml_mati' => $request->jumlahmati,
                'jml_hidup' => $request->jumlahhidup,
                'userid' => auth()->user()->id,
            );
        }

        try {
            Monitoring::where('idmonev', $id)->update($data);

            Alert::success('Sukses', 'Menyimpan Data Baru');

            return redirect('monitoring');
        } catch (\Throwable $th) {
            Alert::success('Error', 'Terjadi Kesalahan Saat Menyimpan Data');

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = Monitoring::where('idmonev', $id)->first();

        if (File::exists(public_path('image/penanamanmonev/' . $old->foto))) {
            File::delete(public_path('image/penanamanmonev/' . $old->foto));
            $old = Monitoring::where('idmonev', $id)->delete();

            Alert::success('Sukses', 'Menghapus Data');
            return redirect('monitoring');
        }
        Alert::error('Terjadi Kesalahan', 'File Tidak Ada Pada Sistem');
        return redirect('monitoring');
    }
}
