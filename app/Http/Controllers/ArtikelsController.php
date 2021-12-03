<?php

namespace App\Http\Controllers;

use App\Models\Artikels;
use App\Models\ArtikelsAdmin;
use App\Models\KonfirmasiPembayaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ArtikelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikels  $artikels
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $btn = false;
        $cek_btns = KonfirmasiPembayaran::where('users_id', Auth::user()->id)->first();
        $cek_btns ? $btn = true : null;
        $artikels = ArtikelsAdmin::where('slug', $slug)->first();
        return view('home_user.artikel', compact(['artikels', 'btn', 'cek_btns']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikels  $artikels
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikels $artikels)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikels  $artikels
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artikels $artikels)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikels  $artikels
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikels $artikels)
    {
        //
    }
}
