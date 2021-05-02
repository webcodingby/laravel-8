@extends('layout')

@section('title', isset($user) ? 'Update '.$user->name : 'Create User')


@section('content')
<a type="button" class="btn btn-info" href="{{ route('users.index') }}">Пользователи</a>
<form method="POST"
      @if (isset($user))
        action="{{ route('users.update', $user) }}"
      @else
        action="{{ route('users.store') }}"
      @endif
      class="mt-3">
    @csrf
    @isset($user)
      @method('PUT')
    @endisset
    <div class="row">
        <div class="col">
            <input name="name" type="text" class="form-control" placeholder="Name" aria-label="Name"
                value="{{ old('name', isset($user) ? $user->name : null) }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
        </div>
        <div class="col">
            <input name="email" type="email" class="form-control" placeholder="email" aria-label="email"
                value="{{ old('email', isset($user) ? $user->email : null) }}">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <button type="submit" class="btn btn-success">Создать</button>
        </div>
    </div>
</form>
@endsection
