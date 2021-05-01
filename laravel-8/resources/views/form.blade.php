@extends('layout')

@section('title', isset($user) ? 'Update '.$user->name : 'Create User')


@section('content')
<a type="button" class="btn btn-info" href="{{ route('users.index') }}">Back to users</a>
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
            <input name="name" type="text" class="form-control" placeholder="Name" aria-label="Name" value="{{ isset($user) ? $user->name : null }}">
        </div>
        <div class="col">
            <input name="email" type="email" class="form-control" placeholder="email" aria-label="email" value="{{ isset($user) ? $user->email : null }}">
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <button type="submit" class="btn btn-success">Create</button>
        </div>
    </div>
</form>
@endsection
