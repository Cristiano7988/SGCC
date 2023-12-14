<?php

namespace App\Http\Controllers;

use App\Helpers\Checa;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
            'email' => [$requiredIfNew, 'string', 'email', 'max:255', $user ? Rule::unique('users')->ignore($user->id) : 'unique:users'],
            'is_admin' => ['boolean', 'declined_if:is_admin,true'],
            'password' => [$requiredIfNew, 'string', 'min:8', 'confirmed', ],
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
            extract(request()->all());
            $users = User::query();
            
            $perPage = $perPage ?? 10;
            $users = $users->paginate($perPage);
            
            $api = Checa::middleware('api');

            return $api
                ? response($users)
                : view('auth.admin.users.index', compact('users'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \App\Models\User
     */
    protected function create()
    {
        try {
            return view('auth.admin.users.create');
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
            $api = Checa::middleware('api');

            // Aqui validamos os dados
            $validator = $this->validator($request->all());
            if ($validator->fails()) return $api
             ? response($validator->errors(), 422)
             : redirect()->back()->withErrors($validator);;

            $request['is_admin'] = true;
            $request['password'] = Hash::make($request['password']);

            $newUser = User::create($request->all());

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
                : view('auth.admin.users.show', compact('user'));
        } catch(\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('auth.admin.users.edit', compact('user'));
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
            $api = Checa::middleware('api');
            
            // Aqui validamos os dados da requisição
            $validator = $this->validator($request->all(), $user);
            if ($validator->fails()) return $api
                ? response($validator->errors(), 422)
                : redirect()->back()->withErrors($validator);

            if ($request['password']) $request['password'] = Hash::make($request['password']);
            else unset($request['password']);
            
            $user->update($request->all());

            $mensagem = "O usuário {$user->name} foi alterado.";
    
            return $api
                ? response($mensagem)
                : redirect()->route("show-user", $user->id)->with('success', $mensagem);
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
                : redirect()->route('list-users')->with('success', $mensagem);
            } catch (\Throwable $th) {
            throw $th;
        }
    }
}
