@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row bg-primary m-2 text-white font-weight-bold">
            <div class="col-3 p-2">
                <a title="Back to index" href="{{route('index')}}"><i class=" fa fa-long-arrow-left"></i></a>
                <span>Name and Surname</span>
            </div>
            <div class="col-2 p-2">
                <span>Email</span>
            </div>
            <div class="col-1 p-2">
                <span>Role</span>
            </div>
            <div class="col-2 p-2">
                <span>Created at</span>
            </div>
            <div class="col-2 p-2">
                <span>Updated at</span>
            </div>
            <div class="col-1 p-2">
                <span>Actions</span>
            </div>
            <div class="col-1 p-2">
                <a title="Add new user" href="{{route('users.create')}}"><i class="fa fa-user-plus"></i></a>
            </div>
        </div>
    @foreach($users as $user)
        <div class="row bg-primary m-2 text-white table-content">
                <div class="col-3 p-2">
                    <span class="ml-4">{{$user->name}} {{$user->surname}}</span>
                </div>
                <div class="col-2 p-2">
                    <span>{{$user->email}}</span>
                </div>
                <div class="col-1 p-2">
                    @if($user->role_id === 1)
                    <span>Admin</span>
                    @else
                    <span>Crew</span>
                    @endif
                </div>
                <div class="col-2 p-2">
                    <span>{{$user->created_at}}</span>
                </div>
                <div class="col-2 p-2">
                    <span>{{$user->updated_at}}</span>
                </div>
                <div class="col-1 p-2">
                    <a title="Edit" href="{{route('users.edit', ['user' => $user->id])}}">
                        <i class="fa fa-edit pointer p-1"></i>
                    </a>
                    <span title="Delete" data-id="{{$user->id}}" class="delete">
                            <i class="fa fa-times pointer p-1"></i>
                    </span>
                </div>
        </div>
    @endforeach
    </div>
@endsection
@section('scripts')
    <script src="{{asset('/js/functions.js')}}"></script>
    <script src="{{asset('/js/user/delete.js')}}"></script>
@endsection
