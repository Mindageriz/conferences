@extends('layouts.app')
@section('title', $conference->title)
@section('content')
    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <div class="mb-3">
            <a href="{{route('conferences.index')}}" class="btn btn-sm btn-outline-secondary">Back</a>
        </div>
        <div class="card">
            <div class="card-body">
                <h1 class="h3 mb-3">{{$conference->title}}</h1>
                <dl class="row">
                    <dt class="col-sm-3">Date</dt>
                    <dd class="col-sm-9">{{$conference->date?->format('Y-m-d')}}</dd>
                    <dt class="col-sm-3">Location</dt>
                    <dd class="col-sm-9">
                        {{$conference->address}}<br>
                        {{$conference->city}}, {{$conference->country}}
                    </dd>
                    <dt class="col-sm-3">Participants</dt>
                    <dd class="col-sm-9">{{$conference->participantCount}}</dd>
                </dl>
                <hr>
                <h2 class="h5">Description</h2>
                <p class="mt-2">{{$conference->description}}</p>
                @auth
                    <div class="mt-4 d-flex gap-2">
                        <a href="{{route('conferences.edit', $conference)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('conferences.destroy', $conference)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this conference?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </div>
@endsection
