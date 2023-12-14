<?php

namespace App\Http\Controllers;

use App\Helpers\Checa;
use App\Models\Carro;
use App\Models\Status;
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
            extract(request()->all());

            $carros = Carro::query();
            $perPage = $perPage ?? 10;
            $carros = $carros->paginate($perPage);

            $api = Checa::middleware('api');

            return $api
                ? response($carros)
                : view('auth.admin.carros.index', compact('carros'));
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
        try {
            $estados = Status::all();
            return view('auth.admin.carros.create', compact('estados'));
        } catch (\Throwable $th) {
            throw $th;
        }
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
            $api = Checa::middleware('api');

            // Aqui validamos os dados
            $validator = $this->validator($request->all());
            if ($validator->fails()) return $api
                ? response($validator->errors(), 422)
                : redirect()->back()->withErrors($validator);

            // Aqui criamos o carro
            $carro = Carro::create($request->all());
            $mensagem = "Carro modelo {$carro->modelo} adicionado.";

            return $api
                ? response($mensagem)
                : redirect()->route('list-carros')->with('success', $mensagem);
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
            $api = Checa::middleware('api');

            $carro->preco = 'R$' . ' ' . number_format($carro->preco, 2, ',', '');

            return $api
                ? response($carro)
                : view('auth.admin.carros.show', compact('carro'));
            
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
        $dados['carro'] = $carro;
        $dados['estados'] = Status::all();

        return view('auth.admin.carros.edit', $dados);
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
            $api = Checa::middleware('api');

            // Aqui validamos os dados
            $validator = $this->validator($request->all(), $carro);
            if ($validator->fails()) return $api
                ? response($validator->errors(), 422)
                : redirect()->back()->withErrors($validator);
            
            $carro->update($request->all());
            $mensagem = "O carro {$carro->modelo} foi alterado.";

            return $api
                ? response($mensagem)
                : redirect()->route('show-carro', $carro->id)->with('success', $mensagem);
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
            $api = Checa::middleware('api');
            $carro->delete();
            $mensagem = "O carro nº #{$carro->id} de modelo {$carro->modelo} foi deletado.";

            return $api
                ? response($mensagem)
                : redirect()->route('list-carros')->with('success', $mensagem);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
