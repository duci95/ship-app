@extends('layout.master')
@section('content')
    <div class="display-4 w-100 p-2 bg-primary text-white">
        <div class="text-center">Edit notification</div>
    </div>
    <div class="container p-2 mx-auto">
        <div class="row p-2 justify-content-center">
            <div class="col-6 bg-light">
                <div class="form-group">
                    <label for="content" class="form-check-label">Content</label>
                    <input type="text" class="form-control" id="content" value="{{$note[0]->content}}">
                    <input type="hidden" id="id" value="{{$note[0]->id}}">
                </div>
            </div>
        </div>
        <div class="row p-1">
            <div class="col-6 bg-light">
                <div class="form-group">
                    <label for="rank" class="form-check-label">Ranks</label>
                    <select id="rank" multiple class="text-capitalize form-control multiple">
                        @foreach($ranks as $rank)
                            <option value="{{$rank->id}}"
                                    @foreach($note[0]->notification_ranks as $nr)
                                        @if($rank->id === $nr->rank_id)
                                            selected="selected"
                                        @endif
                                    @endforeach
                            >{{$rank->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row p-2 justify-content-center">
            <div class="col-3 bg-light">
                <label for=""></label>
                <a class="btn btn-secondary form-control" href="{{route('notifications.index')}}">Back</a>
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
    <script src="{{asset('/js/notification/edit.js')}}"></script>
@endsection
