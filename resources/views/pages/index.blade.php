@extends('layout.master')
@section('content')
    @if(session()->get('user')->role_id === 1)
    <div class="container">
        <div class="row p-4">
            <div class="col-6">
                <a href="{{route('users.index')}}">
                    <button class="btn-block btn-primary p-2 text-white">Users</button>
                </a>
            </div>
            <div class="col-6">
                <a href="{{route('ships.index')}}">
                    <button class="btn-block btn-primary p-2 text-white">Ships</button>
                </a>
            </div>
        </div>
        <div class="row p-4">
            <div class="col-6">
                <a href="{{route('ranks.index')}}">
                    <button class="btn-block btn-primary p-2 text-white">Ranks</button>
                </a>
            </div>
            <div class="col-6">
                <a href="{{route('notifications.index')}}">
                    <button class="btn-block btn-primary p-2 text-white">Notifications</button>
                </a>
            </div>
        </div>
    </div>
    @elseif(session()->get('user')->role_id === 2)
        <div class="container p-2 bg-primary text-white mt-1">
            <div class="row">
                <div class="col-5">
                    <span class="font-weight-bold">Content</span>
                </div>
            </div>
        </div>
            @if($data !== null)
                @foreach($data as $note)
                    <div class="container mt-3">
                        <div class="row p-2 bg-primary">
                            <div class="col-5">
                                <span class="text-capitalize text-white">{{$note->content}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
    @endif
@endsection
