<?php

namespace App\Http\Controllers\Auth;
use App\User;
use App\role;
use App\companyregisters;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use Hash;

class LoginController extends Controller
{
    
    // |--------------------------------------------------------------------------
    // | Login Controller
    // |--------------------------------------------------------------------------
    // |
    // | This controller handles authenticating users for the application and
    // | redirecting them to your home screen. The controller uses a trait
    // | to conveniently provide its functionality to your applications.
    // |
    

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
 
    public function Callback($provider)
    {
        
        $userSocial     =   Socialite::driver($provider)->stateless()->user();
        $users          =   User::where(['email' => $userSocial->getEmail()])->first();

        if($users){
            Auth::login($users);

                              return redirect('/');

        }else{

            $user = User::create([
                'name'          => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'provider_id'   => $userSocial->getId(),
                'provider'      => $provider,
                'email_verified_at' => now(),
            ]);
            
        $role = role::select('id')->where('name', 'user')->first();

        $user->roles()->attach($role);

        return $user;
        }
    }

    public function redirectTo()
    {
        if(Auth::User()->hasRole('admin')){
            return 'adminhome'; 

        }elseif(Auth::User()->hasRole('vendor')){
                  

                  if(Auth::User()->hasuserID(Auth::id())){

                        return '/';

                            
                  }else
                      {
                             return'home';  
                      }
                 

             }elseif (Auth::User()->hasRole('user')) 
             {
               return '/';
             }
            
      }
    


}
