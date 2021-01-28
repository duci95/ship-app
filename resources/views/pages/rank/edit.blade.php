@extends('layout.master')
@section('content')
    <div class="display-4  w-100 p-2 bg-primary text-white">
        <div class="text-center">Edit rank</div>
    </div>
    <div class="container p-2 mx-auto">
        <div class="row p-2 justify-content-center">
            <div class="col-6 bg-light">
                <div class="form-group">
                    <label for="name" class="form-check-label">Name</label>
                    <input type="text" class="form-control" id="name" value="{{$rank->name}}">
                    <input type="hidden" id="id" value="{{$rank->id}}">
                </div>
            </div>
        </div>
        <div class="row p-2 justify-content-center">
            <div class="col-3 bg-light">
                <label for=""></label>
                <a class="btn btn-secondary form-control" href="{{route('ranks.index')}}">Back</a>
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
    <script src="{{asset('/js/rank/edit.js')}}"></script>
@endsection
