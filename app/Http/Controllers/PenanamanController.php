<?php

namespace App\Http\Controllers;

use App\Models\PenanamanModel as penanaman;
use App\Models\JenisMangroveModel as jenismangrove;
use App\Models\LahanModel as lahan;
use App\Models\MangroveModel as mangrove;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class PenanamanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        return view('penanaman/penanaman/penanaman', ['data' => $data, 'mangrove' => $mangrove, 'lahan' => $lahan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mangrove = mangrove::all();
        $lahan = lahan::all();
        return view('penanaman/penanaman/form', ['mangrove' => $mangrove, 'lahan' => $lahan]);
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
            'tgltanam' => 'required',
            'jmltanam' => 'required',
            'pihaktanam' => 'required',
            'statustanam' => 'required',
        ], [
            'idmangrove.required' => 'Pilih Salah Satu.',
            'idmangrove.exists' => 'Pilih Salah Satu.',
            'idlahan.required' => 'Pilih Salah Satu.',
            'idlahan.exists' => 'Pilih Salah Satu.',
            'tgltanam.required' => 'Harus Diisi.',
            'jmltanam.required' => 'Harus Diisi.',
            'pihaktanam.required' => 'Harus Diisi.',
            'statustanam.required' => 'Harus Diisi'
        ]);
        $data = array(
            'idmangrove' => $request->idmangrove,
            'idlahan' => $request->idlahan,
            'tgltanam' => $request->tgltanam,
            'jmltanam' => $request->jmltanam,
            'pihaktanam' => $request->pihaktanam,
            'statustanam' => $request->statustanam,
            'userid' => auth()->user()->id
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
        $mangrove = mangrove::all();
        $data = penanaman::join('mangrove', 'mangrove.idmangrove', '=', 'penanaman.idmangrove')
            ->where('idtanam', $id)
            ->get(['penanaman.*', 'mangrove.mangroveindo']);
        return view('penanaman/penanaman/form', ['data' => $data, 'mangrove' => $mangrove]);
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
            'idmangrove' => 'required|exists:App\Models\MangroveModel,idmangrove',
            'tgltanam' => 'required',
            'jmltanam' => 'required',
            'pihaktanam' => 'required',
            'statustanam' => 'required'
        ], [
            'idmangrove.required' => 'Pilih Salah Satu.',
            'idmangrove.exists' => 'Pilih Salah Satu.',
            'tgltanam.required' => 'Harus Diisi.',
            'jmltanam.required' => 'Harus Diisi.',
            'pihaktanam.required' => 'Harus Diisi.',
            'statustanam.required' => 'Harus Diisi'
        ]);
        $data = array(
            'idmangrove' => $request->idmangrove,
            'tgltanam' => $request->tgltanam,
            'jmltanam' => $request->jmltanam,
            'pihaktanam' => $request->pihaktanam,
            'statustanam' => $request->statustanam,
            'userid' => auth()->user()->id
        );

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
        penanaman::where('idtanam', $id)->delete();

        Alert::success('Sukses', 'Menghapus Data');

        return redirect('penanaman');
    }
}
