@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Usuário') }}
                    <div>
                        <a href="{{ route('edit-user', $user->id) }}" class="btn btn-primary">Editar</a>
                        @if (Auth::user()->is_admin || Auth::user()->is_dev)
                            <form method="POST" onsubmit="confirm('Deseja excluir esse usuário?')" action="{{ route('destroy-user', $user->id) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    <p>
                        <b>Nome:</b>
                        <span>{{ $user->name }}</span>
                    </p>
                    <p>
                        <b>Email:</b>
                        <span>{{ $user->email }}</span>
                    </p>
                    <div class="d-flex justify-content-end gap-2">
                        @if ($user->is_admin)
                            <div class="alert alert-info" role="alert">
                                Administrador
                            </div>
                        @endif
                        @if ($user->is_dev)
                            <div class="alert alert-dark" role="alert">
                                Desenvolvedor
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
