@extends('layout')

@section('title', 'Пользователь '.$user->name)


@section('content')
<a class="btn btn-info" role="button" href="{{ route('users.index') }}">Главная</a>
    <div class="card text-center mt-4" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text">{{ $user->email }}</p>
            <p class="card-text">Создан: {{ $user->created_at->format('d.m.y')}}</p>
            <p class="card-text">Обновлен: {{ $user->updated_at->format('d.m.y H:i:s') }}</p>
            <a href="{{ route('users.edit', $user) }}" class="btn btn-success">Изменить</a>
            <a href="{{ route('users.deploy', $user) }}" class="btn btn-danger">Удалить</a>
        </div>
    </div>
@endsection
