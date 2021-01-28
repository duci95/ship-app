@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row bg-primary m-2 text-white font-weight-bold">
            <div class="col-1 p-3">
                <a title="Back to index" href="{{route('index')}}"><i class=" fa fa-long-arrow-left"></i></a>
                <span>Image</span>
            </div>
            <div class="col-2 p-3">
                <span>Name</span>
            </div>
            <div class="col-2 p-3">
                <span>Serial number</span>
            </div>
            <div class="col-2 p-3">
                <span>Created at</span>
            </div>
            <div class="col-2 p-3">
                <span>Updated at</span>
            </div>
            <div class="col-2 p-3">
                <span>Actions</span>
            </div>
            <div class="col-1 p-3">
                <a title="Add new ship" href="{{route('ships.create')}}"><i class="fa fa-plus-square"></i></a>
            </div>
        </div>
        @if($ships !== null)
            @foreach($ships as $ship)
                <div class="row bg-primary m-2 text-white table-content">
                    <div class="col-1 p-1">
                    <span class="ml-4">
                        <img src="{{asset('images').'/'.$ship->image}}" width="50" height="50" alt="">
                    </span>
                    </div>
                    <div class="col-2 p-3">
                        <span>{{$ship->name}}</span>
                    </div>
                    <div class="col-2 p-3">
                        <span>{{$ship->serial_number}}</span>
                    </div>
                    <div class="col-2 p-3">
                        <span>{{$ship->created_at}}</span>
                    </div>
                    <div class="col-2 p-3">
                        <span>{{$ship->updated_at}}</span>
                    </div>
                    <div class="col-2 p-3">
                        <a title="Edit" href="{{route('ships.edit', ['ship' => $ship->id])}}">
                            <i class="fa fa-edit pointer p-1"></i>
                        </a>
                        <span title="Delete" data-id="{{$ship->id}}" class="delete">
                            <i class="fa fa-times pointer p-1 "></i>
                        </span>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
@section('scripts')
    <script src="{{asset('/js/functions.js')}}"></script>
    <script src="{{asset('/js/ship/delete.js')}}"></script>
@endsection
