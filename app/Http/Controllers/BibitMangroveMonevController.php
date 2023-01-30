<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BibitMangroveMonevModel as BibitMonev;
use App\Models\BibitMangroveModel as Bibit;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class BibitMangroveMonevController extends Controller
{
    protected $idbibit;
    protected $menu;

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            if (Session::get("idbibit") == false) {
                Redirect::to('bibit')->send();
            }
            $this->idbibit = Session::get('idbibit');
            $this->menu = array(
                'linkF' => '/bibit',
                'linkFname' => 'Bibit',
                'linkS' => '/bibitmonev',
                'linkSname' => 'Bibit Monev'
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
        $bibit = Bibit::join('mangrove', 'mangrove.idmangrove', '=', 'bibit_mangrove.idmangrove')->where('idbibit', $this->idbibit)->get(['bibit_mangrove.*', 'mangrove.mangroveindo', 'mangrove.mangrovelatin'])->first();
        $data = Bibitmonev::where('idbibit', $this->idbibit)->get();

        return view('bibit/bibitmonev/bibitmonev', ['data' => $data, 'bibit' => $bibit, 'menu' => $this->menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->menu += ['linkC' => '', 'linkCname' => 'Tambah Data'];
        return view('bibit/bibitmonev/form', ['menu' => $this->menu]);
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
            'tanggal' => 'required|date',
            'tinggi' => 'required|integer',
            'jumlah' => 'required|integer',
            // 'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:100'
            'foto' => 'required|file|image|mimes:jpeg,png,jpg'
        ], [
            'tanggal.required' => 'Harus Diisi.',
            'tanggal.date' => 'Isi Dengan Tanggal',
            'tinggi.required' => 'Harus Diisi.',
            'tinggi.integer' => 'Harus Diisi Dengan Angka.',
            'jumlah.required' => 'Harus Diisi.',
            'jumlah.integer' => 'Harus Diisi Dengan Angka.',
            'foto.required' => 'Harus Diisi.',
            'foto.image' => 'File harus Berbentuk Image.',
            'foto.mimes' => 'Bentuk File Harus JPEG, PNG, JPG',
            // 'foto.max' => 'besar file maksimal 100kb.'
        ]);

        // dd($data);

        $file = $request->file('foto');
        $file_name = time() . '_' . $file->getClientOriginalName();
        $path = 'image/bibitmangrovemonev';
        $file->move($path, $file_name);
        $data = array(
            'idbibit' => $this->idbibit,
            'tglmonev' => $request->tanggal,
            'tinggibibit' => $request->tinggi,
            'jml_daun' => $request->jumlah,
            'userid' => auth()->user()->id,
            'foto' => $file_name
        );

        try {
            BibitMonev::create($data);
            Alert::success('Sukses', 'Menyimpan Data Baru');
            return redirect('bibitmonev');
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
        $data = BibitMonev::where('idmonevbibit', $id)->first();

        return view('bibit/bibitmonev/form', ['data' => $data, 'menu' => $this->menu]);
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
            'tanggal' => 'required|date',
            'tinggi' => 'required|integer',
            'jumlah' => 'required|integer',
            // 'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:100'
            'foto' => 'file|image|mimes:jpeg,png,jpg'
        ], [
            'tanggal.required' => 'Harus Diisi.',
            'tanggal.date' => 'Isi Dengan Tanggal',
            'tinggi.required' => 'Harus Diisi.',
            'tinggi.integer' => 'Harus Diisi Dengan Angka.',
            'jumlah.required' => 'Harus Diisi.',
            'jumlah.integer' => 'Harus Diisi Dengan Angka.',
            'foto.image' => 'File harus Berbentuk Image.',
            'foto.mimes' => 'Bentuk File Harus JPEG, PNG, JPG',
            // 'foto.max' => 'besar file maksimal 100kb.'
        ]);

        $old = BibitMonev::where('idmonevbibit', $id)->first();

        if ($request->foto != '') {
            $file = $request->file('foto');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $path = 'image/bibitmangrovemonev';
            if (File::exists(public_path('image/bibitmangrovemonev/' . $old->foto))) {
                File::delete(public_path('image/bibitmangrovemonev/' . $old->foto));
            } else {
                Alert::error('Terjadi Kesalahan', 'File Tidak Ada Pada Sistem');
                return redirect()->back();
            }
            $file->move($path, $file->getClientOriginalName());
            $data = array(
                'idbibit' => $this->idbibit,
                'tglmonev' => $request->tanggal,
                'tinggibibit' => $request->tinggi,
                'jml_daun' => $request->jumlah,
                'userid' => auth()->user()->id,
                'foto' => $file_name
            );
        } else {
            $data = array(
                'idbibit' => $this->idbibit,
                'tglmonev' => $request->tanggal,
                'tinggibibit' => $request->tinggi,
                'jml_daun' => $request->jumlah,
                'userid' => auth()->user()->id,
            );
        }

        try {
            BibitMonev::where('idmonevbibit', $id)->update($data);
            Alert::success('Sukses', 'Menyimpan Data Baru');

            return redirect('bibitmonev');
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
        $old = BibitMonev::where('idmonevbibit', $id)->first();

        if (File::exists(public_path('image/bibitmangrovemonev/' . $old->foto))) {
            File::delete(public_path('image/bibitmangrovemonev/' . $old->foto));
            $old = BibitMonev::where('idmonevbibit', $id)->delete();

            Alert::success('Sukses', 'Menghapus Data');
            return redirect('bibitmonev');
        }
        Alert::error('Terjadi Kesalahan', 'File Tidak Ada Pada Sistem');
        return redirect()->back();
    }
}
