@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Carro') }}
                    <div>
                        @auth
                            @if (Auth::user()->is_admin || Auth::user()->is_dev)
                            <a href="{{ route('edit-carro', $carro->id) }}" class="btn btn-primary">Editar</a>
                                <form method="POST" onsubmit="confirm('Deseja excluir esse carro?')" action="{{ route('destroy-carro', $carro->id) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>

                <div class="card-body">
                    <p>
                        <b>Modelo:</b>
                        <span>{{ $carro->modelo }}</span>
                    </p>
                    <p>
                        <b>Ano:</b>
                        <span>{{ $carro->ano }}</span>
                    </p>
                    <p>
                        <b>Preço:</b>
                        <span>{{ $carro->preco }}</span>
                    </p>
                    <div class="d-flex">
                        @if ($carro->status->tipo == 'vendido')
                            <div class="alert alert-dark text-capitalize" role="alert">
                                {{ $carro->status->tipo }}
                            </div>
                        @else
                            <div class="alert alert-info text-capitalize" role="alert">
                                {{ $carro->status->tipo }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
