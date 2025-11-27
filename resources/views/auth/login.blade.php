@extends('layouts.app')
@section('content')
    <h2>Log in</h2>
    <form method="POST" action="/login">
        @csrf
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button class="btn btn-primary">Log in</button>
    </form>
@endsection
