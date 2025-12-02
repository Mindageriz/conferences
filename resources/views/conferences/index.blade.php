@extends('layouts.app')
@section('title', 'Conferences')
@section('content')
    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3 mb-0">Conferences</h1>
            @auth
                <a href="{{route('conferences.create')}}" class="btn btn-primary">New conference</a>
            @endauth
        </div>
        @forelse($conferences as $conference)
            <div class="card mb-3">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="h5 mb-1">
                            <a href="{{route('conferences.show', $conference)}}">{{$conference->title}}</a>
                        </h2>
                        <div class="text-muted small">
                            {{$conference->date?->format('Y-m-d')}}
                            @if($conference->city || $conference->$country)
                                {{$conference->city}}, {{$conference->country}}
                            @endif
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{route('conferences.show', $conference)}}" class="btn btn-sm btn-outline-secondary">View</a>
                        @auth
                            <a href="{{route('conferences.edit', $conference)}}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{route('conferences.destroy', $conference)}}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you wanto to delete this conference?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        @empty
            <p>No conferences found.</p>
        @endforelse
    </div>
@endsection
