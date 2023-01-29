<?php

namespace App\Http\Controllers;

use App\Models\PenanamanModel as penanaman;
use App\Models\JenisMangroveModel as jenismangrove;
use App\Models\LahanModel as lahan;
use App\Models\MangroveModel as mangrove;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class PenanamanController extends Controller
{
    protected $menu;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->menu = array(
                'linkF' => '/penanaman',
                'linkFname' => 'Penanaman',
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
        $mangrove = mangrove::all();
        $lahan = lahan::all();
        $data = penanaman::join('mangrove', 'mangrove.idmangrove', '=', 'penanaman_mangrove.idmangrove')
            ->join('lahan', 'lahan.idlahan', '=', 'penanaman_mangrove.idlahan')
            ->get(['penanaman_mangrove.*', 'mangrove.mangroveindo', 'lahan.namalahan']);
        return view('penanaman/penanaman/penanaman', ['data' => $data, 'mangrove' => $mangrove, 'lahan' => $lahan, 'menu' => $this->menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->menu += ['linkS' => '', 'linkSname' => 'Tambah Data'];
        $mangrove = mangrove::all();
        $lahan = lahan::all();
        return view('penanaman/penanaman/form', ['mangrove' => $mangrove, 'lahan' => $lahan, 'menu' => $this->menu]);
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
            'idmangrove' => 'required|exists:App\Models\MangroveModel,idmangrove',
            'idlahan' => 'required|exists:App\Models\LahanModel,idlahan',
            'blok_lahan' => 'required',
            'tgltanam' => 'required',
            'jmltanam' => 'required',
            'pihaktanam' => 'required',
            'statustanam' => 'required',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:100'
        ], [
            'idmangrove.required' => 'Pilih Salah Satu.',
            'idmangrove.exists' => 'Pilih Salah Satu.',
            'idlahan.required' => 'Pilih Salah Satu.',
            'idlahan.exists' => 'Pilih Salah Satu.',
            'blok_lahan.required' => 'Harus Diisi.',
            'tgltanam.required' => 'Harus Diisi.',
            'jmltanam.required' => 'Harus Diisi.',
            'pihaktanam.required' => 'Harus Diisi.',
            'statustanam.required' => 'Harus Diisi.',
            'foto.required' => 'Harus Diisi.',
            'foto.image' => 'File harus Berbentuk Image.',
            'foto.mimes' => 'Bentuk File Harus JPEG, PNG, JPG',
            'foto.max' => 'besar file maksimal 100kb.'
        ]);

        $file = $request->file('foto');
        $file_name = time() . '_' . $file->getClientOriginalName();
        $path = 'image/penanaman';
        $file->move($path, $file_name);

        $data = array(
            'idmangrove' => $request->idmangrove,
            'idlahan' => $request->idlahan,
            'blok_lahan' => $request->blok_lahan,
            'tgltanam' => $request->tgltanam,
            'jmltanam' => $request->jmltanam,
            'pihak_tanam' => $request->pihaktanam,
            'statustanam' => $request->statustanam,
            'userid' => auth()->user()->id,
            'foto' => $file_name
        );

        penanaman::create($data);

        Alert::success('Sukses', 'Menyimpan Data Baru');

        return redirect('penanaman');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $mangrove = mangrove::all();
        $lahan = lahan::all();
        $data = penanaman::where('idtanam', $id)->first();
        return view('penanaman/penanaman/form', ['data' => $data, 'mangrove' => $mangrove, 'lahan' => $lahan, 'menu' => $this->menu]);
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
        $old = penanaman::where('idtanam', $id)->first();
        $request->validate([
            'idmangrove' => 'required|exists:App\Models\MangroveModel,idmangrove',
            'idlahan' => 'required|exists:App\Models\LahanModel,idlahan',
            'blok_lahan' => 'required',
            'tgltanam' => 'required',
            'jmltanam' => 'required',
            'pihaktanam' => 'required',
            'statustanam' => 'required',
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:100'
        ], [
            'idmangrove.required' => 'Pilih Salah Satu.',
            'idmangrove.exists' => 'Pilih Salah Satu.',
            'idlahan.required' => 'Pilih Salah Satu.',
            'idlahan.exists' => 'Pilih Salah Satu.',
            'blok_lahan.required' => 'Harus Diisi.',
            'tgltanam.required' => 'Harus Diisi.',
            'jmltanam.required' => 'Harus Diisi.',
            'pihaktanam.required' => 'Harus Diisi.',
            'statustanam.required' => 'Harus Diisi.',
            'foto.image' => 'File harus Berbentuk Image.',
            'foto.mimes' => 'Bentuk File Harus JPEG, PNG, JPG',
            'foto.max' => 'besar file maksimal 100kb.'
        ]);

        if ($request->foto != '') {
            $file = $request->file('foto');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $path = 'image/penanaman';
            if (File::exists(public_path('image/penanaman/' . $old->foto))) {
                File::delete(public_path('image/penanaman/' . $old->foto));
            } else {
                Alert::error('Terjadi Kesalahan', 'File Tidak Ada Pada Sistem');
                return redirect()->back();
            }
            $file->move($path, $file_name);
            $data = array(
                'idmangrove' => $request->idmangrove,
                'idlahan' => $request->idlahan,
                'blok_lahan' => $request->blok_lahan,
                'tgltanam' => $request->tgltanam,
                'jmltanam' => $request->jmltanam,
                'pihak_tanam' => $request->pihaktanam,
                'statustanam' => $request->statustanam,
                'userid' => auth()->user()->id,
                'foto' => $file_name
            );
        } else {
            $data = array(
                'idmangrove' => $request->idmangrove,
                'idlahan' => $request->idlahan,
                'blok_lahan' => $request->blok_lahan,
                'tgltanam' => $request->tgltanam,
                'jmltanam' => $request->jmltanam,
                'pihak_tanam' => $request->pihaktanam,
                'statustanam' => $request->statustanam,
                'userid' => auth()->user()->id,
            );
        }

        penanaman::where('idtanam', $id)->update($data);

        Alert::success('Sukses', 'Menyimpan Data Baru');

        return redirect('penanaman');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = penanaman::where('idtanam', $id)->first();

        if (File::exists(public_path('image/penanaman/' . $old->foto))) {
            File::delete(public_path('image/penanaman/' . $old->foto));
            $old = penanaman::where('idtanam', $id)->delete();

            Alert::success('Sukses', 'Menghapus Data');
            return redirect('penanaman');
        }
        Alert::error('Terjadi Kesalahan', 'File Tidak Ada Pada Sistem');
        return redirect()->back();
    }

    public function monitoringlist()
    {
        $mangrove = mangrove::all();
        $lahan = lahan::all();
        $data = penanaman::join('mangrove', 'mangrove.idmangrove', '=', 'penanaman_mangrove.idmangrove')
            ->join('lahan', 'lahan.idlahan', '=', 'penanaman_mangrove.idlahan')
            ->get(['penanaman_mangrove.*', 'mangrove.mangroveindo', 'lahan.namalahan']);
        return view('monitoring/monitoringlist', ['data' => $data, 'mangrove' => $mangrove, 'lahan' => $lahan, 'menu' => $this->menu]);
    }

    public function detail($id)
    {
        Session::forget('idtanam');
        Session::put('idtanam', $id);
        return redirect('monitoring');
    }
}
