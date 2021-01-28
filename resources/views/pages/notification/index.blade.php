@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row bg-primary m-2 text-white font-weight-bold">
            <div class="col-1 p-2">
                <a title="Back to index" href="{{route('index')}}"><i class=" fa fa-long-arrow-left"></i></a>
            </div>
            <div class="col-3 p-2">
                <span>Content</span>
            </div>
            <div class="col-2 p-2">
                <span>Created at</span>
            </div>
            <div class="col-2 p-2">
                <span>Updated at</span>
            </div>
            <div class="col-2 p-2">
                <span>Actions</span>
            </div>
            <div class="col-1 p-2">
                <a title="Add new notification" href="{{route('notifications.create')}}"><i class="fa fa-plus-square"></i></a>
            </div>
        </div>
        @if($notes !== null)
            @foreach($notes as $note)
                <div class="row bg-primary m-2 text-white table-content">
                    <div class="col-1 p-2">
                    </div>
                    <div class="col-3 p-2">
                        <span class="text-capitalize">{{$note->content}}</span>
                    </div>
                    <div class="col-2 p-2">
                        <span>{{$note->created_at}}</span>
                    </div>
                    <div class="col-2 p-2">
                        <span>{{$note->updated_at}}</span>
                    </div>
                    <div class="col-1 p-2">
                        <a title="Info" href="{{route('notifications.show', ['notification' => $note->id])}}">
                            <i class="fa fa-info-circle pointer p-1"></i>
                        </a>
                        <a title="Edit" href="{{route('notifications.edit', ['notification' => $note->id])}}">
                            <i class="fa fa-edit pointer p-1"></i>
                        </a>
                        <span title="Delete" data-id="{{$note->id}}" class="delete">
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
    <script src="{{asset('/js/notification/delete.js')}}"></script>
@endsection
