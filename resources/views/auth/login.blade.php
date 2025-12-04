@extends('layouts.app')
@section('content')
    <h2>{{__('messages.auth.login_title')}}</h2>
    <form method="POST" action="/login">
        @csrf
        <div class="mb-3">
            <label for="email">{{__('messages.auth.email')}}</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password">{{__('messages.auth.password')}}</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button class="btn btn-primary">{{__('messages.auth.submit')}}</button>
    </form>
@endsection
