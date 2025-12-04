@extends('layouts.app')
@section('title', 'Edit conference')
@section('content')
    <div class="container mt-4">
        <div class="mb-3">
            <a href="{{route('conferences.show', $conference)}}" class="btn btn-sm btn-outline-secondary">{{__('messages.conference.back')}}</a>
        </div>
        <div class="card">
            <div class="card-body">
                <h1 class="h4 mb-3">{{__('messages.conference.edit_title')}}</h1>
                <form action="{{route('conferences.update', $conference)}}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('conferences.form', ['conference' => $conference])
                    <button type="submit" class="btn btn-primary">{{__('messages.conference.save')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
