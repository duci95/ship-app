@extends('layout.master')
@section('content')
    <div class="container">
        <div class="row bg-primary m-2 text-white font-weight-bold">
            <div class="col-1 p-2">
                <a title="Back to index" href="{{route('index')}}"><i class=" fa fa-long-arrow-left"></i></a>
            </div>
            <div class="col-3 p-2">
                <span>Name</span>
            </div>
            <div class="col-3 p-2">
                <span>Created at</span>
            </div>
            <div class="col-2 p-2">
                <span>Updated at</span>
            </div>
            <div class="col-2 p-2">
                <span>Actions</span>
            </div>
            <div class="col-1 p-2">
                <a title="Add new rank" href="{{route('ranks.create')}}"><i class="fa fa-plus-square"></i></a>
            </div>
        </div>
        @foreach($ranks as $rank)
            <div class="row bg-primary m-2 text-white table-content">
                <div class="col-1 p-2">
                </div>
                <div class="col-3 p-2">
                    <span class="text-capitalize">{{$rank->name}}</span>
                </div>
                <div class="col-3 p-2">
                    <span>{{$rank->created_at}}</span>
                </div>
                <div class="col-2 p-2">
                    <span>{{$rank->updated_at}}</span>
                </div>
                <div class="col-1 p-2">
                    <a title="Edit" href="{{route('ranks.edit', ['rank' => $rank->id])}}">
                        <i class="fa fa-edit pointer p-1"></i>
                    </a>
                    <span title="Delete" data-id="{{$rank->id}}" class="delete">
                            <i class="fa fa-times pointer p-1"></i>
                    </span>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('scripts')
    <script src="{{asset('/js/functions.js')}}"></script>
    <script src="{{asset('/js/rank/delete.js')}}"></script>
@endsection
