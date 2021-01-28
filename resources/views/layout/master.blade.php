@include('partials.head')
@include('partials.header')
@yield('content')
<script src="{{asset("/")}}plugins/jquery/jquery.min.js"></script>
<script src="{{asset("/")}}plugins/bootstrap/js/bootstrap.js"></script>
<script src="{{asset("/")}}plugins/notify.min.js"></script>
<script src="{{asset("/")}}plugins/bootbox.all.min.js"></script>
@yield('scripts')
