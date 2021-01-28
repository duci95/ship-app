@extends('layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="form-group">
            <div class="form-row p-2">
                <label for="email" class="form-check-label">Email</label>
                <input type="text" id="email" class="form-control" />
            </div>
            <div class="form-row p-2">
                <label for="password" class="form-check-label">Password</label>
                <input type="password" id="password" class="form-control"/>
            </div>
            <div class="form-row p-2" >
                <input type="button" value="Submit" id="btn" class="btn btn-primary"/>
            </div>
        </div>
    </div>

    <span class="errors text-danger"></span>
</div>
@endsection
@section('scripts')
    <script src="{{asset('/js/regex.js')}}"></script>
    <script src="{{asset('/js/functions.js')}}"></script>
    <script src="{{asset('/js/login.js')}}"></script>
@endsection
