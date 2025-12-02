@extends('layouts.app')
@section('title', 'Create conference')
@section('content')
    <div class="container mt-4">
        <div class="mb-3">
            <a href="{{route('conferences.index')}}" class="btn btn-sm btn-outline-secondary">Back</a>
        </div>
        <div class="card">
            <div class="card-body">
                <h1 class="h4 mb-3">Create conference</h1>
                <form action="{{route('conferences.store')}}" method="POST">
                    @csrf
                    @include('conferences.form', ['conference' => null])
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
