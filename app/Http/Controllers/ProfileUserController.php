<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;
use App\Models\KonfirmasiPembayaran;
use Illuminate\Support\Facades\Auth;

class ProfileUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $btn = false;
        $cek_btns = KonfirmasiPembayaran::where('users_id', Auth::user()->id)->first();
        $cek_btns ? $btn = true : null;
        return view('profile-user.profileuser', compact(['users', 'cek_btns', 'btn']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'password' => 'required',
        ]);

         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'password' => $request->password,
         ]);
        return redirect()->route('profile-user.profile_user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::findOrFail($id);
        $profiles = User::where('id', $id)->first();
        $btn = false;
        $cek_btns = KonfirmasiPembayaran::where('users_id', Auth::user()->id)->first();
        $cek_btns ? $btn = true : null;

        return view('profile.profileuser', compact(['users', 'profiles', 'cek_btns', 'btn']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);
        $btn = false;
        $cek_btns = KonfirmasiPembayaran::where('users_id', Auth::user()->id)->first();
        $cek_btns ? $btn = true : null;
        
        return view("profile.edit_users", compact(['users', 'cek_btns', 'btn']));
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
        // $this->validate($request, [
        //     "name" => "required|string",
        //     "no_hp" => "required|numeric",
        //     "email" => "required|email:dns|unique:users",
        //     "alamat" => "required"
        // ]);

        $request->user()->update(
            $request->all()
        );

        return back()->with('success', 'Data telah berhasil diperbaharui!!');
        // $users = User::find($id)->update($request->all());
        // return back()->with('success', 'Data telah diperbaharui!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // http://project_isi_air_minum.test
        //         MAIL_FROM_ADDRESS=null
        // MAIL_FROM_NAME="${APP_NAME}"
    }
}
