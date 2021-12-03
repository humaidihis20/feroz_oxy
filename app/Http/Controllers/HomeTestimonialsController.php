<?php

namespace App\Http\Controllers;

use App\Models\HomeTestimonials;
use App\Models\User;
use App\Models\KonfirmasiPembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class HomeTestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =  Auth::user()->id;
        $btn = false;
        $cek_btns = KonfirmasiPembayaran::where('users_id', Auth::user()->id)->first();
        $cek_btns ? $btn = true : null;
        $testimonials = DB::table('users')
                ->join('testimoni', 'users.id', '=', 'testimoni.users_id')
                ->select('testimoni.*')
                ->get();
        $tampil_pelanggan =  User::where('level', '=', 'user')->count();
        return view('home_user.home_testimonial', compact(['testimonials', 'users', 'tampil_pelanggan' , 'cek_btns', 'btn']));
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
        $komentars = $request->validate([
            'users_id' => 'required',
            'testimonial' => 'required|min:5'
        ], [
            'testimonial.required' => 'Tidak boleh kosong',
            'testimonial.min' => 'Minimal 5 kata'
        ]);

        $komentars['testimonial'] = Str::limit($request->testimonial, 500);
        HomeTestimonials::create($komentars);

        return redirect('testimonial_home')->with('success', 'Data berhasil disimpan!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeTestimonials  $homeTestimonials
     * @return \Illuminate\Http\Response
     */
    public function show(HomeTestimonials $homeTestimonials)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeTestimonials  $homeTestimonials
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeTestimonials $homeTestimonials)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeTestimonials  $homeTestimonials
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeTestimonials $homeTestimonials)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeTestimonials  $homeTestimonials
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeTestimonials $homeTestimonials)
    {
        //
    }
}

