<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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


    protected function token(Request $request)
    {
        $user = User::whereEmail($request->email)->first();
        $data['message'] = 'E-mail ou senha incorretos!';
        if(isset($user) && $user->checkPassword($request->password) ){
            $data['user'] = $user;
            $data['user']['token'] = $user->apiToken();
            $data['message'] = 'Autenticado com sucesso!';
        }
        return response()->json($data);
    }


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
