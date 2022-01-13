<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use Exception;
use App\Models\User;
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
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function redirectToGoogle() 
    {
        return Socialite::driver('google')->redirect();    
//        echo "<pre>";
//        print_r('hii');
//        echo "</pre>";
//        die();     
    }
    public function handleGooglecallback() 
    {
//        $user = Socialite::driver('google')->user();
//         $this->_registrationOfLoginUser($data);
//        return redirect()->route('view');
        try {
    
            $user = Socialite::driver('google')->user();
     
            $finduser = User::where('google_id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return view('view');
     
            }else{
            echo "<pre>";
            print_r('hii');
            echo "</pre>";
            die();
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
    
                Auth::login($newUser);
     
                return redirect('/login');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
