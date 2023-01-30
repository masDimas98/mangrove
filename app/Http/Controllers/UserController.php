<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{

    protected $menu;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->menu = array(
                'linkF' => '/user',
                'linkFname' => 'Users',
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
        $data = User::where('hakakses', '!=', 1)->get();
        return view('user/user', ['data' => $data, 'menu' => $this->menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->menu += ['linkC' => '', 'linkCname' => 'Ubah Data'];
        return view('user/form', ['menu' => $this->menu]);
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'telp' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telp' => $request->telp,
            'hakakses' => 4
        ]);

        event(new Registered($user));

        Alert::success('Sukses', 'Menyimpan Data Baru');

        return redirect('user');
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
        $data = User::where('id', $id)->first();

        return view('user/form', ['data' => $data, 'menu' => $this->menu]);
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
        $old = User::where('id', $id)->first();
        if ($old->email == $request->email && $request->password == '') {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'telp' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'hakakses' => 'required|integer|between:2,3'
            ]);
        } else {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['confirmed', Rules\Password::defaults()],
                'telp' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'hakakses' => 'required|integer|between:2,3'
            ]);
        }


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telp' => $request->telp,
            'hakakses' => $request->hakakses
        ]);

        User::where('id', $id)->update($user);

        Alert::success('Sukses', 'Merubah Data');

        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            User::where('id', $id)->delete();

            Alert::success('Sukses', 'Menghapus Data');

            return redirect('user');
        } catch (\Throwable $th) {
            Alert::danger('Error', 'Terjadi Kesalahan Saat Menghapus Data');

            return redirect()->back();
        }
    }
}
