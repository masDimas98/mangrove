<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BibitMangroveMonevModel as BibitMonev;
use App\Models\BibitMangroveModel as Bibit;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class BibitMangroveMonevController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bibit = Bibit::all();
        $data = BibitMonev::all();

        return view('bibit/bibitmonev/bibitmonev', ['data' => $data, 'bibit' => $bibit]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bibit = Bibit::all();

        return view('bibit/bibitmonev/form', ['bibit' => $bibit]);
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
            'idbibit' => 'required|exists:App\Models\BibitMangroveModel, idbibit',
            'tglmonev' => 'required|date',
            'tinggibibit' => 'required|integer',
            'jml_daun' => 'required|integer',
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:100'
        ], [
            'idbibit.required' => 'Harus Diisi.',
            'idbibit.exists' => 'Bibit Tidak Terdaftar.',
            'tglmonev.required' => 'Harus Diisi.',
            'tglmonev.date' => 'Isi Dengan Tanggal',
            'tinggibibit.required' => 'Harus Diisi.',
            'tinggibibit.integer' => 'Harus Diisi Dengan Angka.',
            'jml_daun.required' => 'Harus Diisi.',
            'jml_daun.integer' => 'Harus Diisi Dengan Angka.',
            'foto.image' => 'File harus Berbentuk Image.',
            'foto.mimes' => 'Bentuk File Harus JPEG, PNG, JPG',
            'foto.max' => 'besar file maksimal 100kb.'
        ]);

        $file = $request->file('foto');
        $file_name = time() . '_' . $file->getClientOriginalName();
        $path = 'image/bibitmangrovemonev';
        $file->move($path, $file_name);

        $data = array(
            'idbibit' => $request->idbibit,
            'tglmonev' => $request->tglmonev,
            'tinggibibit' => $request->tinggibibit,
            'jml_daun' => $request->jml_daun,
            'userid' => auth()->user()->id,
            'foto' => $file_name
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
        $bibit = Bibit::all();
        $data = BibitMonev::where('idmonevbibit', $id)->first();

        return view('bibit/bibitmonev/form', ['data' => $data, 'bibit' => $bibit]);
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
            'idbibit' => 'required|exists:App\Models\BibitMangroveModel, idbibit',
            'tglmonev' => 'required|date',
            'tinggibibit' => 'required|integer',
            'jml_daun' => 'required|integer',
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:100'
        ], [
            'idbibit.required' => 'Harus Diisi.',
            'idbibit.exists' => 'Bibit Tidak Terdaftar.',
            'tglmonev.required' => 'Harus Diisi.',
            'tglmonev.date' => 'Isi Dengan Tanggal',
            'tinggibibit.required' => 'Harus Diisi.',
            'tinggibibit.integer' => 'Harus Diisi Dengan Angka.',
            'jml_daun.required' => 'Harus Diisi.',
            'jml_daun.integer' => 'Harus Diisi Dengan Angka.',
            'foto.image' => 'File harus Berbentuk Image.',
            'foto.mimes' => 'Bentuk File Harus JPEG, PNG, JPG',
            'foto.max' => 'besar file maksimal 100kb.'
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
                'idbibit' => $request->idbibit,
                'tglmonev' => $request->tglmonev,
                'tinggibibit' => $request->tinggibibit,
                'jml_daun' => $request->jml_daun,
                'userid' => auth()->user()->id,
                'foto' => $file_name
            );
        } else {
            $data = array(
                'idbibit' => $request->idbibit,
                'tglmonev' => $request->tglmonev,
                'tinggibibit' => $request->tinggibibit,
                'jml_daun' => $request->jml_daun,
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
        $old = Bibit::where('idmonevbibit', $id)->first();

        if (File::exists(public_path('image/bibitmangrovemonev/' . $old->foto))) {
            File::delete(public_path('image/bibitmangrovemonev/' . $old->foto));
            $old = Bibit::where('idmonevbibit', $id)->delete();

            Alert::success('Sukses', 'Menghapus Data');
            return redirect('bibitmonev');
        }
        Alert::error('Terjadi Kesalahan', 'File Tidak Ada Pada Sistem');
        return redirect()->back();
    }
}
