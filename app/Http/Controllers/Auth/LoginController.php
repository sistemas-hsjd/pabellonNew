<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Rules\isValidProfile;
use App\Models\User;
use App\Models\UserPortal;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Session;
use Symfony\Component\HttpFoundation\Request;

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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'gl_rut'; //ahora utilizaremos la columna gl_rut de la tabla users
    }

    public function loginPortal(Request $request)
    {
        $request->validate([
            'rUser' => ['required', 'string', new isValidProfile],
            'tUser' => 'required|string',
        ]);

        $usr = UserPortal::where('rut', $request->rUser)->firstOrFail();
        // dd($usr->token, $request->tUser);
        if ($usr->token == $request->tUser) {
            $user = User::where('gl_rut', $request->rUser)->firstOrFail();

            Auth::loginUsingId($user->id);
            Session::put('token', $request->tUser);
            Session::put('id_user_portal', $usr->id);
            return $this->sendLoginResponse( $request);
        } else {
            return $this->sendFailedLoginResponse($request);
        }
    }
}
