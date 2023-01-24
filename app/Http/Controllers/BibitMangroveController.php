<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BibitMangroveModel as Bibit;
use App\Models\MangroveModel as Mangrove;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class BibitMangroveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mangrove = Mangrove::all();
        $data = Bibit::join('mangrove', 'mangrove.idmangrove', '=', 'bibit_mangrove.idmangrove')->get(['bibit_mangrove.*', 'mangrove.mangroveindo']);
        return view('bibit/bibit/bibit', ['data' => $data, 'mangrove' => $mangrove]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mangrove = Mangrove::all();
        return view('bibit/bibit/form', ['mangrove' => $mangrove]);
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
            'tgltanam' => 'required|date',
            // 'foto' => 'file|image|mimes:jpeg,png,jpg|max:100'
            'foto' => 'required|file|image|mimes:jpeg,png,jpg'
        ], [
            'idmangrove.required' => 'Harus Diisi.',
            'tgltanam.required' => 'Harus Diisi.',
            'tgltanam.date' => 'Isi Dengan Tanggal',
            'foto.required' => 'Harus Diisi.',
            'foto.image' => 'File harus Berbentuk Image.',
            'foto.mimes' => 'Bentuk File Harus JPEG, PNG, JPG',
            // 'foto.max' => 'besar file maksimal 100kb.'
        ]);


        $file = $request->file('foto');
        $file_name = time() . '_' . $file->getClientOriginalName();
        $path = 'image/bibitmangrove';
        $file->move($path, $file_name);

        $data = array(
            'idmangrove' => $request->idmangrove,
            'tgltanam' => $request->tgltanam,
            'userid' => auth()->user()->id,
            'foto' => $file_name,
        );

        try {
            Bibit::create($data);

            Alert::success('Sukses', 'Menyimpan Data Baru');

            return redirect('bibit');
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
        $mangrove = Mangrove::all();
        $data = Bibit::where('idbibit', $id)->first();
        return view('bibit/bibit/form', ['data' => $data, 'mangrove' => $mangrove]);
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
            'idmangrove' => 'required|exists:App\Models\MangroveModel,idmangrove',
            'tgltanam' => 'required|date',
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:100'
        ], [
            'idmangrove.required' => 'Harus Diisi.',
            'tgltanam.required' => 'Harus Diisi.',
            'foto.image' => 'File harus Berbentuk Image.',
            'foto.mimes' => 'Bentuk File Harus JPEG, PNG, JPG',
            'foto.max' => 'besar file maksimal 100kb.'
        ]);

        $old = Bibit::where('idbibit', $id)->first();

        if ($request->foto != '') {
            $file = $request->file('foto');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $path = 'image/bibitmangrove';
            if (File::exists(public_path('image/bibitmangrove/' . $old->foto))) {
                File::delete(public_path('image/bibitmangrove/' . $old->foto));
            } else {
                Alert::error('Terjadi Kesalahan', 'File Tidak Ada Pada Sistem');
                return redirect()->back();
            }
            $file->move($path, $file_name);
            $data = array(
                'idmangrove' => $request->idmangrove,
                'tgltanam' => $request->tgltanam,
                'userid' => auth()->user()->id,
                'foto' => $file_name,
            );
        } else {
            $data = array(
                'idmangrove' => $request->idmangrove,
                'tgltanam' => $request->tgltanam,
                'userid' => auth()->user()->id,
            );
        }

        try {
            Bibit::where('idbibit', $id)->update($data);

            Alert::success('Sukses', 'Menyimpan Data Baru');

            return redirect('bibit');
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
        $old = Bibit::where('idbibit', $id)->first();

        if (File::exists(public_path('image/bibitmangrove/' . $old->foto))) {
            File::delete(public_path('image/bibitmangrove/' . $old->foto));
            $old = Bibit::where('idbibit', $id)->delete();

            Alert::success('Sukses', 'Menghapus Data');
            return redirect('bibit');
        }
        Alert::error('Terjadi Kesalahan', 'File Tidak Ada Pada Sistem');
        return redirect('bibit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
    }
}
