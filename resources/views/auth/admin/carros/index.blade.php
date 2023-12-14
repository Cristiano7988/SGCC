@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Carros') }}
                    @auth
                        @if (Auth::user()->is_admin || Auth::user()->is_dev)
                        <div>
                            <a href="{{ route('create-carro') }}" class="btn btn-primary">Adicionar Carro</a>
                        </div>
                        @endif
                    @endauth
                </div>

                <div>
                    <table class="table table-striped table-dark mb-0">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Ano</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carros as $carro)
                                <tr style="cursor: pointer;" onclick="location.pathname =  '/carros/'+{{$carro->id}}">
                                    <th scope="row">#{{$carro->id}}</th>
                                    <td>
                                        {{ $carro->modelo }}
                                    </td>
                                    <td>
                                        {{ $carro->ano }}
                                    </td>
                                    <td>
                                        {{ $carro->preco }}
                                    </td>
                                    <td>
                                        {{ $carro->status->tipo }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if ($carros->hasPages())
                    <div class="p-3" style="display: flex; justify-content: center">
                        {{ $carros->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
