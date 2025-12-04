@extends('layouts.app')
@section('title', 'Conferences')
@section('content')
    <div class="container mt-4">
        @if(session('success'))
            <div id="flash-success" data-message="{{session('success')}}"></div>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3 mb-0">{{__('messages.conference.list_title')}}</h1>
            @auth
                <a href="{{route('conferences.create')}}" class="btn btn-primary">{{__('messages.conference.new')}}</a>
            @endauth
        </div>
        @forelse($conferences as $conference)
            <div class="card mb-3">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="h5 mb-1">
                            <a>{{$conference->title}}</a>
                        </h2>
                        <div class="text-muted small">
                            {{$conference->date?->format('Y-m-d')}}
                            @if($conference->city || $conference->$country)
                                {{$conference->city}}, {{$conference->country}}
                            @endif
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{route('conferences.show', $conference)}}" class="btn btn-sm btn-outline-secondary">{{__('messages.conference.view')}}</a>
                        @auth
                            <a href="{{route('conferences.edit', $conference)}}" class="btn btn-sm btn-outline-primary">{{__('messages.conference.edit')}}</a>
                            <form action="{{route('conferences.destroy', $conference)}}" method="POST" class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-outline-danger delete-btn"
                                        data-confirm-title="{{ __('messages.conference.messages.confirm_delete_title') }}"
                                        data-confirm-text="{{ __('messages.conference.messages.confirm_delete_text') }}"
                                        data-confirm-confirm="{{ __('messages.conference.delete') }}"
                                        data-confirm-cancel="{{__('messages.conference.messages.cancel')}}">
                                    {{__('messages.conference.delete')}}
                                </button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        @empty
            <p>{{__('messages.conference.no_conferences')}}</p>
        @endforelse
    </div>
@endsection
