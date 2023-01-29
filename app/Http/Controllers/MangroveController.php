<?php

namespace App\Http\Controllers;

use App\Models\MangroveModel as mangrove;
use App\Models\JenisMangroveModel as jenismangrove;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class MangroveController extends Controller
{
    protected $menu;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->menu = array(
                'linkF' => '/mangrove',
                'linkFname' => 'Mangrove',
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
        $jenis = jenismangrove::all();
        $data = mangrove::join('jenis_mangrove', 'jenis_mangrove.idjenis', '=', 'mangrove.idjenis')->get(['mangrove.*', 'jenis_mangrove.namajenislatin', 'jenis_mangrove.namajenisindo']);
        return view('mangrove/mangrove/mangrove', ['data' => $data, 'jenismangrove' => $jenis, 'menu' => $this->menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->menu += ['linkC' => '', 'linkCname' => 'Ubah Data'];;
        $jenis = jenismangrove::all();
        return view('mangrove/mangrove/form', ['jenismangrove' => $jenis, 'menu' => $this->menu]);
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
            'idjenis' => 'required|exists:App\Models\JenisMangroveModel,idjenis',
            'mangrovelatin' => 'required',
            'mangroveindo' => 'required'
        ], [
            'idjenis.required' => 'Pilih Salah Satu.',
            'idjenis.exists' => 'Pilih Salah Satu.',
            'mangrovelatin.required' => 'Harus Diisi.',
            'mangroveindo.required' => 'Harus Diisi.'
        ]);
        $data = array(
            'idjenis' => $request->idjenis,
            'mangrovelatin' => $request->mangrovelatin,
            'mangroveindo' => $request->mangroveindo,
            'userid' => auth()->user()->id
        );
        mangrove::create($data);

        Alert::success('Sukses', 'Menyimpan Data Baru');

        return redirect('mangrove');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jenis = jenismangrove::all();
        if ($id == '0') {
            $data = mangrove::join('jenis_mangrove', 'jenis_mangrove.idjenis', '=', 'mangrove.idjenis')->get(['mangrove.*', 'jenis_mangrove.namajenislatin', 'jenis_mangrove.namajenisindo']);
        } else {
            $data = mangrove::join('jenis_mangrove', 'jenis_mangrove.idjenis', '=', 'mangrove.idjenis')->where('mangrove.idjenis', $id)->get(['mangrove.*', 'jenis_mangrove.namajenislatin', 'jenis_mangrove.namajenisindo']);
        }
        return view('mangrove/mangrove/mangrove', ['data' => $data, 'jenismangrove' => $jenis, 'filter' => $id, 'menu' => $this->menu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->menu += ['linkC' => '', 'linkCname' => 'Ubah Data'];;
        $jenis = jenismangrove::all();
        $data = mangrove::where('idmangrove', $id)->first();
        return view('mangrove/mangrove/form', ['data' => $data, 'jenismangrove' => $jenis, 'menu' => $this->menu]);
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
            'idjenis' => 'required|exists:App\Models\JenisMangroveModel,idjenis',
            'mangrovelatin' => 'required',
            'mangroveindo' => 'required'
        ], [
            'idjenis.required' => 'Pilih Salah Satu.',
            'idjenis.exists' => 'Pilih Salah Satu.',
            'mangrovelatin.required' => 'Harus Diisi.',
            'mangroveindo.required' => 'Harus Diisi.'
        ]);
        $data = array(
            'idjenis' => $request->idjenis,
            'mangrovelatin' => $request->mangrovelatin,
            'mangroveindo' => $request->mangroveindo,
            'userid' => auth()->user()->id
        );
        mangrove::where('idmangrove', $id)->update($data);

        Alert::success('Sukses', 'Menyimpan Data Baru');

        return redirect('jenismangrove');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        mangrove::where('idmangrove', $id)->delete();

        Alert::success('Sukses', 'Menghapus Data');

        return redirect('mangrove');
    }
}
