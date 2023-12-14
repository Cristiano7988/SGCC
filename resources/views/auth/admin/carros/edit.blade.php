@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Carro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update-carro', $carro->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="row mb-3">
                            <label for="modelo" class="col-md-4 col-form-label text-md-end">{{ __('Modelo') }}</label>

                            <div class="col-md-6">
                                <input id="modelo" type="text" class="form-control @error('modelo') is-invalid @enderror" name="modelo" value="{{ $carro->modelo }}" required autocomplete="modelo" autofocus>

                                @error('modelo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ano" class="col-md-4 col-form-label text-md-end">{{ __('Ano') }}</label>

                            <div class="col-md-6">
                                <input id="ano" type="numeric" min="1886" max="{{ date('Y') }}" step="1" class="form-control @error('ano') is-invalid @enderror" name="ano" value="{{ $carro->ano }}" required autocomplete="ano" autofocus>

                                @error('ano')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="preco" class="col-md-4 col-form-label text-md-end">{{ __('Preço') }}</label>

                            <div class="col-md-6">
                                <input id="preco" type="numeric" step="any" class="form-control @error('preco') is-invalid @enderror" name="preco" value="{{ $carro->preco }}" required autocomplete="preco">

                                @error('preco')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4"></div>
                            <div class="col-md-6">
                                @foreach ($estados as $estado)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_id" value="{{$estado->id}}" id="flexRadio{{$estado->id}}" @if ($carro->status_id == $estado->id) checked @endif>
                                    <label class="form-check-label text-capitalize" for="status_id">
                                        {{ $estado->tipo }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Atualizar carro') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
