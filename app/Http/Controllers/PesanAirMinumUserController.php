<?php

namespace App\Http\Controllers;

use App\Models\PesanAir;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\KonfirmasiPembayaran;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class PesanAirMinumUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_users = Auth::user()->id;
        $btn = false;
        $cek_btns = KonfirmasiPembayaran::where('users_id', Auth::user()->id)->first();
        $cek_btns ? $btn = true : null;
    
        $pesanair =  DB::table('pesan_air')
                        ->where('users_id', $id_users)
                        ->orderBy('id', 'desc')
                        ->first();
        // $nama = $pesanair->name;
        // dd($nama);
        return view('halaman_pesan_air.konfirmasi_pembayaran', compact(['pesanair', 'id_users', 'cek_btns', 'btn']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pesanan_detail = auth()->user();
        $id = Auth::user()->id;
        $users_id = User::find($id);
        $detail_pesanan = KonfirmasiPembayaran::all();
        $id_pelanggan = PesanAir::id_pelanggan();
        $btn = false;
        $cek_btns = KonfirmasiPembayaran::where('users_id', Auth::user()->id)->first();
        $cek_btns ? $btn = true : null;
    	return view('halaman_pesan_air.pesan_air', compact(['users_id', 'id_pelanggan', 'detail_pesanan', 'pesanan_detail', 'cek_btns', 'btn']));
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
            'users_id' => 'required',
            'kode_pelanggan' =>'required',
            'name' => 'required|min:3|max:40',
            'email' => 'required|email:dns',
            'no_hp' => 'required|numeric|digits_between:1,13',
            'jumlah_pesanair' => 'required',
            'tanggal' => 'required',
            'alamat' => 'required',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama lengkap minimal 3 kata',
            'name.max' => 'Nama lengkap maksimal 40 kata',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Note: email@gmail.com (email aktif)',
            'no_hp.required' => 'No_Hp tidak boleh kosong',
            'no_hp.digits_between' => 'No_Hp min-maks 1-13 angka',
            'no_hp.numeric' => 'No_Hp harus number',
            'jumlah_pesanair.required' => 'Jumlah pesan air tidak boleh kosong',
            'tanggal.required' => 'Tanggal pengiriman tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
        ]);
    
        $harga_pergalon = 9000;
        $biaya_pengantar = 10000;
        $harga_galon = str_replace('.', '', $harga_pergalon);
        $b_pengantar = str_replace('.', '', $biaya_pengantar);
        $jumlah_pesanair = explode(" ", $request->jumlah_pesanair);
        $jumlah_pergalon = $jumlah_pesanair[0] * $harga_galon;
        $total = $jumlah_pergalon + $b_pengantar;
        
            PesanAir::create([
                'users_id' => $request->users_id,
                'kode_pelanggan' => $request->kode_pelanggan,
                'name' => $request->name,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'jumlah_pesanair' => $request->jumlah_pesanair,
                'tanggal' => $request->tanggal,
                'alamat' => $request->alamat,
                'harga_galon' => $harga_galon,
                'biaya_pengantar_galon' => $b_pengantar,
                'total' => $total,
                'status' => 'Belum Lunas'
            ]);

        return redirect('konfirmasi_pembayaran')->with('success', 'Data berhasil dibuat, silahkan cek kembali..');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PesanAir  $pesanAir
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PesanAir  $pesanAir
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $where = array('id' => $id);
        // $pesan_air = PesanAir::where($where)->first();
        $pesan_air = PesanAir::findOrFail($id);
        // dd($pesan_air);
        return response()->json($pesan_air);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PesanAir  $pesanAir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $harga_pergalon = 9000;
        $biaya_pengantar = 10000;
        $harga_galon = str_replace('.', '', $harga_pergalon);
        $b_pengantar = str_replace('.', '', $biaya_pengantar);
        $jumlah_pesanair = explode(" ", $request->jumlah_pesanair);
        $jumlah_pergalon = $jumlah_pesanair[0] * $harga_galon;
        $total = $jumlah_pergalon + $b_pengantar;
        PesanAir::updateOrCreate(['id' => $request->id],
            [
                'name' => $request->name,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'jumlah_pesanair' => $request->jumlah_pesanair,
                'tanggal' => $request->tanggal,
                'alamat' => $request->alamat,
                'harga_galon' => $harga_galon,
                'biaya_pengantar_galon' => $b_pengantar,
                'total' => $total
            ]);

        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PesanAir  $pesanAir
     * @return \Illuminate\Http\Response
     */
    public function destroy(PesanAir $pesanAir)
    {
        //
    }

    public function getInfo ($id)
    {
        $info = PesanAir::findOrFail($id);
        return response()->json($info);
    }
}
