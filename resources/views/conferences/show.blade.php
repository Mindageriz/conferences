@extends('layouts.app')
@section('title', $conference->title)
@section('content')
    <div class="container mt-4">
        @if(session('success'))
            <div id="flash-success" data-message="{{session('success')}}"></div>
        @endif
        <div class="mb-3">
            <a href="{{route('conferences.index')}}" class="btn btn-sm btn-outline-secondary">{{__('messages.conference.back')}}</a>
        </div>
        <div class="card">
            <div class="card-body">
                <h1 class="h3 mb-3">{{$conference->title}}</h1>
                <dl class="row">
                    <dt class="col-sm-3">{{__('messages.conference.fields.date')}}</dt>
                    <dd class="col-sm-9">{{$conference->date?->format('Y-m-d')}}</dd>
                    <dt class="col-sm-3">{{__('messages.conference.fields.address')}}</dt>
                    <dd class="col-sm-9">
                        {{$conference->address}}<br>
                        {{$conference->city}}, {{$conference->country}}
                    </dd>
                    <dt class="col-sm-3">{{__('messages.conference.fields.participants')}}</dt>
                    <dd class="col-sm-9">{{$conference->participantCount}}</dd>
                </dl>
                <hr>
                <h2 class="h5">{{__('messages.conference.fields.description')}}</h2>
                <p class="mt-2">{{$conference->description}}</p>
                @auth
                    <div class="mt-4 d-flex gap-2">
                        <a href="{{route('conferences.edit', $conference)}}" class="btn btn-primary">{{__('messages.conference.edit')}}</a>
                        <form action="{{route('conferences.destroy', $conference)}}" method="POST" class="d-inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger delete-btn"data-confirm-title="{{ __('messages.conference.messages.confirm_delete_title') }}"
                                    data-confirm-text="{{ __('messages.conference.messages.confirm_delete_text') }}"
                                    data-confirm-confirm="{{ __('messages.conference.delete') }}"
                                    data-confirm-cancel="{{__('messages.conference.messages.cancel')}}">
                                {{__('messages.conference.delete')}}</button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </div>
@endsection
