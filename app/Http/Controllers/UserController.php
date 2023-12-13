<?php

namespace App\Http\Controllers;

use App\Helpers\Checa;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $user = false)
    {
        $requiredIfNew = $user ? 'nullable' : 'required';
        return Validator::make($data, [
            'name' => [$requiredIfNew, 'string', 'max:255'],
            'email' => [$requiredIfNew, 'string', 'email', 'max:255', 'unique:users'],
            'is_admin' => ['boolean', 'declined_if:is_admin,true'],
            'password' => [$requiredIfNew, 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $users = User::query();
            $users = $users->paginate();
            
            $api = Checa::middleware('api');

            return $api
                ? response($users)
                : view('');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Create a new user (For admin users).
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function store(Request $request)
    {
        try {
            // Aqui validamos os dados
            $validator = $this->validator($request->all());
            if ($validator->fails()) return response($validator->errors(), 422);

            $request['is_admin'] = true;
            $request['password'] = Hash::make($request['password']);

            $newUser = User::create($request->all());

            $api = Checa::middleware('api');
            $mensagem = "Usuário admin {$newUser->name} adicionado.";

            return $api
                ? response($mensagem)
                : redirect()->back()->with('success', $mensagem);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show an user.
     *
     * @param  User  $user
     * @return \App\Models\User
     */
    protected function show(User $user)
    {
        try {
            $api = Checa::middleware('api');
            return $api
                ? response($user)
                : view('');
        } catch(\Throwable $th) {
            throw $th;
        }
    }

        /**
     * Update an user.
     *
     * @param  User  $user
     * @param  Request  $request
     * @return \App\Models\User
     */
    protected function update(User $user, Request $request)
    {
        try {
            // Aqui validamos os dados da requisição
            $validator = $this->validator($request->all(), $user);
            if ($validator->fails()) return response($validator->errors(), 422);

            if (!!$request['password']) $request['password'] = Hash::make($request['password']);
            $user->update($request->all());

            $api = Checa::middleware('api');
            $mensagem = "O usuário {$user->name} foi alterado.";
    
            return $api
                ? response($mensagem)
                : redirect()->back()->with('success', $mensagem);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            
            $api = Checa::middleware('api');
            $mensagem = "O usuário nº #{$user->id} de nome {$user->name} foi deletado.";

            return $api
                ? response($mensagem)
                : redirect()->back()-with('success', $mensagem);
            } catch (\Throwable $th) {
            throw $th;
        }
    }
}
