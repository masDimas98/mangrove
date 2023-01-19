<?php

namespace App\Http\Controllers;

use App\Models\JenisMangroveModel as jenismangrove;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class JenisMangroveController extends Controller
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
        $data = jenismangrove::all();
        return view('mangrove/jenismangrove/jenismangrove', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mangrove/jenismangrove/form');
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
            'namajenislatin' => 'required',
            'namajenisindo' => 'required'
        ], [
            'namajenislatin.required' => 'Harus Diisi.',
            'namajenisindo.required' => 'Harus Diisi.'
        ]);
        $data = array(
            'namajenislatin' => $request->namajenislatin,
            'namajenisindo' => $request->namajenisindo,
            'userid' => auth()->user()->id
        );
        jenismangrove::create($data);

        Alert::success('Sukses', 'Menyimpan Data Baru');

        return redirect('jenismangrove');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = jenismangrove::where('idjenis', $id)->first();
        return view('mangrove/jenismangrove/form', ['data' => $data]);
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
            'namajenislatin' => 'required',
            'namajenisindo' => 'required'
        ], [
            'namajenislatin.required' => 'Harus Diisi.',
            'namajenisindo.required' => 'Harus Diisi.'
        ]);
        $data = array(
            'namajenislatin' => $request->namajenislatin,
            'namajenisindo' => $request->namajenisindo,
            'userid' => auth()->user()->id
        );
        jenismangrove::where('idjenis', $id)->update($data);

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
        jenismangrove::where('idjenis', $id)->delete();

        Alert::success('Sukses', 'Menghapus Data');

        return redirect('jenismangrove');
    }
}
