<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarroController extends Controller
{
    /**
     * Get a validator for an incoming request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $carro = false)
    {
        $requiredIfNew = $carro ? 'nullable' : 'required';
        return Validator::make($data, [
            'modelo' => [
                $requiredIfNew,
                'string',
                'min:2',
                'max:50'
            ],
            'ano' => [
                $requiredIfNew,
                'numeric',
                'min:1886',
                'max:' . date('Y')
            ],
            'preco' => [
                $requiredIfNew,
                'numeric'
            ],
            'status_id' => [
                $requiredIfNew,
                'exists:status,id'
            ],
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
            $carros = Carro::query();
            $carros = $carros->paginate();

            return response($carros);
        } catch (\Throwable $th) {
            throw $th;
        }
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
        try {
            // Aqui validamos os dados
            $validator = $this->validator($request->all());
            if ($validator->fails()) return response($validator->errors(), 422);

            // Aqui criamos o carro
            $carro = Carro::create($request->all());
            return response($carro);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function show(Carro $carro)
    {
        try {
            return response($carro);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function edit(Carro $carro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carro $carro)
    {
        try {
            // Aqui validamos os dados
            $validator = $this->validator($request->all(), $carro);
            if ($validator->fails()) return response($validator->errors(), 422);
            
            $carro->update($request->all());

            return response($carro);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carro $carro)
    {
        try {
            $carro->delete();
            
            return response("O carro nº #{$carro->id} de modelo {$carro->modelo} foi deletado.");
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
