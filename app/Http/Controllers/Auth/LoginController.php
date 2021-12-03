<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use \App\Models\User;
use Illuminate\Support\Facades\Hash;
use Throwable;

// use AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function google_callback()
    {

      try {
        $user = Socialite::driver('google')->user();
        // dd($user->id);
        $cariUser = User::where('google_id', $user->id)->first();
        
        if ($cariUser) {
          Auth::login($cariUser);
          return redirect('user');
        } else {
          $newUser = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'google_id' => $user->id,
            'no_hp' => '',
            'alamat' => '',
            'level' => 'user',
            'password' => md5($user->token),
            // 'password' => bcrypt('13579'),
          ]);
          Auth::login($newUser);
          return redirect('user');
        }
      } catch(Throwable $e) {
        return redirect('login')->with('error', 'Silahkan login kembali');
      }
        // jika user masih login lempar ke home user
      //   if (Auth::check()) {
      //     return redirect('/user');
      // }

      // $oauthUser = Socialite::driver('google')->user();
      // $user = User::where('google_id', $oauthUser->id)->first();
      // if ($user) {
      //     Auth::loginUsingId();($user->id);
      //     return redirect('/user');
      // } else {
      //     $newUser = User::create([
      //         'name' => $oauthUser->name,
      //         'email' => $oauthUser->email,
      //         'google_id'=> $oauthUser->id,
      //         'no_hp' => '',
      //         'alamat' => '',
      //         'level' => 'user',
      //         // password tidak akan digunakan ;)
      //         'password' => md5($oauthUser->token),
      //     ]);
      //     Auth::login($newUser);
      //     return redirect('/login');
      // }
  }
  
  public function cekRemember(Request $request)
  {
    $remember = $request->remember ? true : false;

    $iPassword = $request->only('name', 'password');
    if (Auth::attempt($iPassword, $remember)) {
      return redirect('user');
    }
    return redirect()->back();
  }
  

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        Session::flash('success', 'Terimakasih, selamat datang kembali!');
        return redirect('login');
    }
}
