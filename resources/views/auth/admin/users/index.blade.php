@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Usuários') }}
                    <div>
                        <a href="{{ route('create-user') }}" class="btn btn-primary">Adicionar Administrador</a>
                    </div>
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($users as $user)
                            <li class="list-group-item">
                                <a href="{{ route('show-user', $user->id) }}">
                                    {{ $user->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="p-3" style="display: flex; justify-content: center">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
