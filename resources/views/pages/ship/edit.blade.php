@extends('layout.master')
@section('content')
    <div class="display-4  w-100 p-2 bg-primary text-white">
        <div class="text-center">Edit ship</div>
    </div>
    <div class="container p-2 mx-auto">
        <div class="row p-2 justify-content-center">
            <div class="col-3 bg-light">
                <div class="form-group">
                    <label for="name" class="form-check-label">Name</label>
                    <input type="text" class="form-control" id="name" value="{{$ship->name}}">
                    <input type="hidden" value="{{$ship->id}}" id="id">
                    <input type="hidden" value="{{$ship->image}}" id="old">
                </div>
            </div>
            <div class="col-3 bg-light">
                <div class="form-group">
                    <label for="serial" class="form-check-label">Serial number</label>
                    <input type="text" class="form-control" id="serial" value="{{$ship->serial_number}}">
                </div>
            </div>
        </div>
        <div class="row p-2 justify-content-center">
            <div class="col-6 p-2 bg-light">
                <label for="image" class="form-check-label">Image</label>
                <input type="file" id="image" class="form-control" accept="image/*">
            </div>
        </div>
        <div class="row p-1 justify-content-center">
            <div class="col-6 bg-light">
                <div class="form-group">
                    <label for="crews" class="form-check-label">Crew members</label>
                    <select id="crews" multiple class="text-capitalize form-control multiple">
                        @foreach($crews as $crew)
                            <option value="{{$crew->id}}"
                            @foreach($ship->users_ships as $user)
                                @if($user->user_id == $crew->id)
                                    selected="selected"
                                @endif
                            @endforeach>
                                {{$crew->name}} {{$crew->surname}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row p-2 justify-content-center">
            <div class="col-1 bg-light">
                <label for=""></label>
                <a class="btn btn-secondary form-control" href="{{route('ships.index')}}">Back</a>
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
    <script src="{{asset('/js/ship/edit.js')}}"></script>
@endsection
