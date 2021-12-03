<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\KonfirmasiPembayaran;
use App\Models\User;
use App\Models\ArtikelsAdmin;
use Illuminate\Support\Facades\DB;

class HomeUserController extends Controller
{
//   public function __construct()
//   {
//     $this->middleware(['admin', 'user']);
//   }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $artikels = DB::table('artikels')->get();
    $user = Auth::user();
    $tampil_pelanggan = User::where('level', '=', 'user')->count();
    
    $btn = false;
    $cek_btns = KonfirmasiPembayaran::where('users_id', Auth::user()->id)->first();
    $cek_btns ? $btn = true : null;
    // if ($cek_btns) {
    //   $btn = true;
    // } 
    // dd($btn);
    return view('home_user.index', compact(['user', 'tampil_pelanggan', 'cek_btns', 'btn', 'artikels']));
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
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $show_artikels = ArtikelsAdmin::where('id', $id)->first();
    return view('home_user.artikel', compact('show_artikels'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
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
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
