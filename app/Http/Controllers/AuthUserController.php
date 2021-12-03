<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KonfirmasiPembayaran;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Carbon;

class AuthUserController extends Controller
{

    public function isAdmin()
    {
        $users = User::all();
        // foreach ($users as $user) {
        //     if (Cache::has('user-is-online-' . $user->id))
        //         echo $user->name . " is online. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " <br>";
        //     else
        //         echo $user->name . " is offline. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " <br>";
        // }
        $tampil_admin = User::where('level', 'admin')->count();
        $tampil_user = User::where('level', 'user')->count();
        return view('kelola_user.user', compact(['tampil_user','users', 'tampil_admin']));
    }

    public function register(Request $request)
    {
      $request->validate([
        'name'                  => 'required|min:3|max:35',
        'email'                 => 'required|email:dns|unique:users',
        'no_hp'                 => 'required|digits_between:1,13',
        'alamat'                => 'required',
        'level'                 => 'required',
        'password'              => 'required|confirmed'
      ], [
        'name.required'         => 'Nama Lengkap wajib diisi',
        'name.min'              => 'Nama lengkap minimal 3 karakter',
        'name.max'              => 'Nama lengkap maksimal 35 karakter',
        'email.required'        => 'Email wajib diisi',
        'email.email'           => 'Email tidak valid',
        'email.unique'          => 'Email sudah terdaftar',
        'password.required'     => 'Password wajib diisi',
        'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
      ]);
  
      if($request->id == null){
        User::create([
          'name' => ucwords(strtolower($request->name)),
          'email' => strtolower($request->email),
          'no_hp' => $request->no_hp,
          'alamat' => $request->alamat,
          'level' => $request->level,
          'password' => Hash::make($request->password),
          'email_verified_at' => \Carbon\Carbon::now(),
        ]);
        // $user = new User;
        // $user->name = ucwords(strtolower($request->name));
        // $user->email = strtolower($request->email);
        // $user->no_hp = $request->no_hp;
        // $user->alamat = $request->alamat;
        // $user->level = $request->level;
        // $user->password = Hash::make($request->password);
        // $user->email_verified_at = \Carbon\Carbon::now();
        // $simpan = $user->save();

      } else {
        User::where('id', '=', $request->id)->update([
          'name' => ucwords(strtolower($request->name)),
          'email' => strtolower($request->email),
          'no_hp' => $request->no_hp,
          'alamat' => $request->alamat,
          // 'level' => $request->level,
          // 'password' => Hash::make($request->password),
          // 'email_verified_at' => \Carbon\Carbon::now(),
      ]);
      
      }
  
      return response()->json();
    }

    public function editUser($id)
    {
        $edit_user = User::findOrFail($id);
        // return response()->json($edit_user);
        // $edit_user = User::findOrFail($request->get('id'));
        return response()->json($edit_user);
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = ucwords(strtolower($request->name));
        $user->email = strtolower($request->email);
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        return response()->json($user);
    }

    public function deleteUser($id)
    {
        User::where('id', $id)->delete();
        return redirect('users');
    }

    public function pesanAir()
    {
      $tampil_pesanan_air = KonfirmasiPembayaran::all()->count();
      $pesanan_air_minum = DB::table('pesan_air')
                            ->join('detail_pesanan', 'pesan_air.id', '=', 'detail_pesanan.pesan_air_id')
                            ->select('pesan_air.*', 'detail_pesanan.metode_pembayaran')
                            ->orderBy('detail_pesanan.id', 'asc')
                            ->get();
                            // dd($detail_pesanan);
      return view('kelola_pesan_air.pesan_air', compact(['pesanan_air_minum', 'tampil_pesanan_air']));
    }
    
    public function deletePesanAir($id)
    {
     $delete_pesanan = DB::table('detail_pesanan')->where('id', $id)->delete(); 
     return redirect('pesanan_air', $delete_pesanan);
    }
}
