@extends('layout')

@section('title', 'Пользователи')


@section('content')
<a class="btn btn-primary" role="button" href="{{ route('users.create') }}">Добавить пользователя</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Email</th>
            <th scope="col">Действие</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>
                <a href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
            </td>
            <td>
                <a href="{{ route('users.show', $user) }}">{{ $user->email }}</a>
            </td>
            <td>
                <form method="POST" action="{{ route('users.destroy', $user) }}" class="d-flex">
                    <a type="button" class="btn btn-outline-warning mx-1" href="{{ route('users.edit', $user) }}">Изменить</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger mx-1">Удалить</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
