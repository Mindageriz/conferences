@extends('layouts.app')
@section('content')
    <h2>Home</h2>
    @auth
        <p>Sveikas prisijungęs, {{ auth()->user()->name }}!</p>
    @else
        <p>Tu esi svečias.</p>
    @endauth
@endsection
