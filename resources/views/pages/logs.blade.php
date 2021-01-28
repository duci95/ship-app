@extends('layout.master')
@section('content')
    <div class="container">
        <div class="row bg-primary m-2 text-white font-weight-bold">
            <div class="col-1 p-2">
                <a title="Back to index" href="{{route('index')}}"><i class=" fa fa-long-arrow-left"></i></a>
            </div>
            <div class="col-3 p-2">
                <span>Action</span>
            </div>
            <div class="col-3 p-2">
                <span>Name and Surname</span>
            </div>
            <div class="col-3 p-2">
                <span>Email</span>
            </div>
            <div class="col-2 p-2">
                <span>Created at</span>
            </div>
        </div>
        @foreach($logs as $log)
            <div class="row bg-primary m-2 text-white table-content">
                <div class="col-1 p-2">
                </div>
                <div class="col-3 p-2">
                    <span>{{$log->action}}</span>
                </div>
                <div class="col-3 p-2">
                    <span>{{$log->user->name}} {{$log->user->surname}}</span>
                </div>
                <div class="col-3 p-2">
                    <span>{{$log->user->email}} </span>
                </div>
                <div class="col-2 p-2">
                    <span>{{$log->created_at}}</span>
                </div>
            </div>
        @endforeach
    </div>
@endsection
