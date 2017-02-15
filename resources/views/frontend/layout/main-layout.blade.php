<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}

    <link rel="icon" href="{{ url()->asset('favicon.ico') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="lang" content="{{ $lang }}">
    <!-- Responsive Window -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Custom fonts -->
    {!! Html::style('https://fonts.googleapis.com/css?family=Open+Sans:400,300,700') !!}

    <!-- CSS Files -->
    {!! Html::style('assets/bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('css/frontend/main.css') !!}
    @yield('css')
  </head>

  <body>
    @include('frontend.include.header')

    <div id="ui-main">
      @yield('content')
    </div>

    @include('frontend.include.footer')
    <script>
      var url = '{{ request()->getBaseUrl() }}';
      var api_url = url+'/api';
      var _token = $('meta[name="csrf-token"]').attr('content');
      var lang = $('meta[name="lang"]').attr('content');
    </script>
    {!! Html::script('assets/global/scripts/jquery.min.js') !!}
    {!! Html::script('assets/bootstrap/js/bootstrap.min.js') !!}

    @yield('script')
  </body>
</html>
