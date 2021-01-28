@if(session()->has('user'))
    <div class="display-3 p-0 bg-info text-white">
        <div class="text-center">
            <div class="container">
                {{session()->get('user')->name}}
                {{session()->get('user')->surname}}
                <a href="{{route('logout')}}" class="btn btn-secondary">Logout</a>
            </div>
        </div>
    </div>
    @if(session()->get('user')->role_id == 1)
    <div class="p-2 bg-info mt-1">
        <div class="text-center">
            <div class="container text-dark ">
                    <a class="btn btn-warning btn-outline-warning" href="{{route('index')}}">Index</a>
                    <a class="btn btn-warning btn-outline-warning" href="{{route('users.index')}}">Users</a>
                    <a class="btn btn-warning btn-outline-warning" href="{{route('ships.index')}}">Ships</a>
                    <a class="btn btn-warning btn-outline-warning" href="{{route('ranks.index')}}">Ranks</a>
                    <a class="btn btn-warning btn-outline-warning" href="{{route('notifications.index')}}">Notifications</a>
                    <a class="btn btn-warning btn-outline-warning" href="{{route('log')}}">Logs</a>
            </div>
        </div>
    </div>
    @else
        <div class="p-2 bg-info mt-1">
            <div class="text-center">
                <div class="container text-dark ">
                    <span class="display-4 text-white">Notifications</span>
                </div>
            </div>
        </div>
    @endif
@endif
