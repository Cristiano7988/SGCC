<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    /**
     * Get a validator for an incoming request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    }

    protected function login(Request $request)
    {
        try {
            // Aqui validamos os dados da requisição
            $validator = $this->validator($request->only('email', 'password'));
            if ($validator->fails()) return response($validator->errors(), 422);

            $user = User::where('email', $request->email)->first();
            if (!$user) return response('Email não cadastrado', 403);

            $passwordChecked = Hash::check($request->password, $user->password);
            if (!$passwordChecked) return response('Senha inválida', 403);

            $user->tokens()->delete();

            $token = $user->createToken($request->email)->plainTextToken;

            return response($token);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
