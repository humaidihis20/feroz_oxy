<?php

namespace App\Http\Controllers;

use App\Models\KonfirmasiPembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PesanAir;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;

class KonfirmasiPembayaranController extends Controller
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
        // $sudah_lunas = KonfirmasiPembayaran::where('status_pembayaran', '=', 'Sudah_lunas');
        // $belum_lunas = KonfirmasiPembayaran::where('status_pembayaran', '=', 'Belum_lunas');
        // dd($belum_lunas);
        $detail_pesanan = DB::table('pesan_air')
                            ->join('detail_pesanan', 'detail_pesanan.users_id', '=', 'pesan_air.users_id')
                            ->select('pesan_air.*', 'detail_pesanan.metode_pembayaran')
                            ->where('pesan_air.users_id', $id_users)
                            ->orderBy('pesan_air.id', 'desc')
                            ->first();  
                            
        $transfer = KonfirmasiPembayaran::where('metode_pembayaran', '=', 'transfer')->count();
        $bayar_ditempat = KonfirmasiPembayaran::where('metode_pembayaran', '=', 'bayar_ditempat')->count();

        return view('halaman_pesan_air.detail_pesanan', compact(['detail_pesanan', 'transfer', 'bayar_ditempat', 'cek_btns', 'btn']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detail_pesanan = PesanAir::all();
        return view('halaman_pesan_air.konfirmasi_pembayaran', compact(['detail_pesanan', 'pesan_air_id']));
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
            'pesan_air_id' => 'required',
            'metode_pembayaran' => 'required',
            // 'status_pembayaran' => 'required'
        ],

        [
            'metode_pembayaran.required' => 'Pilih salah satu metode pembayaran, tidak boleh kosong!!'
        ]);
        $id_users = Auth::user()->id;
        // if($request->status_pembayaran == 'Belum_dibayar') {
            KonfirmasiPembayaran::create([
                'users_id' => $id_users,
                'pesan_air_id' => $request->pesan_air_id,
                'metode_pembayaran' => $request->metode_pembayaran,
                // 'status_pembayaran' => $request->status_pembayaran
            ]);
        // }
        return redirect('detail_pesanan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KonfirmasiPembayaran  $konfirmasiPembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(KonfirmasiPembayaran $konfirmasiPembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KonfirmasiPembayaran  $konfirmasiPembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(KonfirmasiPembayaran $konfirmasiPembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KonfirmasiPembayaran  $konfirmasiPembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KonfirmasiPembayaran $konfirmasiPembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KonfirmasiPembayaran  $konfirmasiPembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(KonfirmasiPembayaran $konfirmasiPembayaran)
    {
        //
    }

    public function confirm($id){
        $confirm=PesanAir::where('id',$id)->first();
        $confirm->status="Sudah Lunas";
        $confirm->update();
        // dd($id);
        return redirect('pesanan_air');
        
    }

    public function cetak_pdf ()
    {
        set_time_limit(60);
        $id_users = Auth::user()->id;
        
        $btn = false;
        $cek_btns = KonfirmasiPembayaran::where('users_id', Auth::user()->id)->first();
        $cek_btns ? $btn = true : null;
        
        $detail_pesanan =  DB::table('pesan_air')
                                ->join('detail_pesanan', 'detail_pesanan.users_id', '=', 'pesan_air.users_id')
                                ->select('pesan_air.*', 'detail_pesanan.metode_pembayaran')
                                ->where('pesan_air.users_id', $id_users)
                                ->orderBy('pesan_air.id', 'desc')
                                ->first();  
                                
        // $judul['judul'] = 'Invoice Pesanan Air Minum';
        // $view_pdf = View::make('halaman_pesan_air.detail_pesanan', compact('btn', 'judul', 'detail_pesanan'));
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML($view_pdf);    
        // $pdf = App::make('dompdf.wrapper');
        // $pdf = PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('halaman_pesan_air.detail_pesanan', compact('btn', 'detail_pesanan'))->setPaper('A4', 'potrait');
        // dd($pdf);
        return $pdf->download('invoice.pdf');
    }
}
