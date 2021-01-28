@extends('layout.master')
@section('content')
    <div class="display-4  w-100 p-2 bg-primary text-white">
        <div class="text-center">Add new user</div>
    </div>
    <div class="container p-2 mx-auto">
        <div class="row p-2 justify-content-center">
            <div class="col-3 bg-light">
                <div class="form-group">
                    <label for="name" class="form-check-label">Name</label>
                    <input type="text" class="form-control" id="name">
                </div>
            </div>
            <div class="col-3 bg-light">
                <div class="form-group">
                    <label for="surname" class="form-check-label">Surname</label>
                    <input type="text" class="form-control" id="surname">
                </div>
            </div>
        </div>
        <div class="row p-2 justify-content-center">
            <div class="col-3 bg-light">
                <div class="form-group">
                    <label for="email" class="form-check-label">Email</label>
                    <input type="text" class="form-control" id="email">
                </div>
            </div>
            <div class="col-3 bg-light">
                <div class="form-group">
                    <label for="password" class="form-check-label">Password</label>
                    <input type="password" class="form-control" id="password">
                </div>
            </div>
        </div>
        <div class="row p-1 justify-content-center">
            <div class="col-6 bg-light ranks">
                <div class="form-group">
                    <label for="rank" class="form-check-label">Ranks</label>
                    <select id="rank" multiple class="text-capitalize form-control multiple">
                        @foreach($ranks as $rank)
                            <option value="{{$rank->id}}">{{$rank->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row p-2 justify-content-center">
            <div class="col-1 bg-light">
                <label for=""></label>
                <a class="btn btn-secondary form-control" href="{{route('users.index')}}">Back</a>
            </div>
            <div class="col-2 bg-light">
                <div class="form-group">
                    <label for="role" class="form-check-label">Role</label>
                    <select id="role" class="text-capitalize form-control">
                        <option value="0">Choose...</option>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3 bg-light">
                <label for=""></label>
                <input type="button" id="btn" class="btn btn-primary form-control" value="Save" />
            </div>
        </div>
        <div class="row p-1 justify-content-center">
            <div class="col-5 text-danger">
                <span class="errors"></span>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('/js/regex.js')}}"></script>
    <script src="{{asset('/js/functions.js')}}"></script>
    <script src="{{asset('/js/user/create.js')}}"></script>
@endsection
