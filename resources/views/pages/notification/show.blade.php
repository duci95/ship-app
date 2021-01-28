@extends('layout.master')
@section('content')
    <div class="display-4 w-100 p-2 bg-primary text-white">
        <div class="text-center">Notifications send to:</div>
    </div>
    <div class="container">
        <div class="row bg-primary m-2 text-white font-weight-bold">
            <div class="col-1 p-2">
                <a title="Back to index" href="{{route('notifications.index')}}"><i class=" fa fa-long-arrow-left"></i></a>
            </div>
            <div class="col-3 p-2">
                <span>Name</span>
            </div>
            <div class="col-4 p-2">
                <span>Surname</span>
            </div>
            <div class="col-3 p-2">
                <span>Email</span>
            </div>
        </div>
        @foreach($results as $user)
            <div class="row bg-primary m-2 text-white">
                <div class="col-1 p-2">
                </div>
                <div class="col-3 p-2">
                    <span>{{$user->name}}</span>
                </div>
                <div class="col-4 p-2">
                    <span>{{$user->surname}}</span>
                </div>
                <div class="col-3 p-2">
                    <span>{{$user->email}}</span>
                </div>
            </div>
        @endforeach
@endsection
