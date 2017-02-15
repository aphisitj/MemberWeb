@extends('frontend.layout.main-layout')

@section('title', ' - Home')

@section('css')
  {!! Html::style('css/frontend/home.css') !!}
@endsection

@section('content')
  <div id="home">
    <div class="container">
      <div class="text-center">
        <h1>Bangkok Solutions</h1>
        <h5><a href="http://www.bangkoksolutions.com" target="_blank">HTTP://WWW.BANGKOKSOLUTIONS.COM</a></h5>
      </div>
    </div>
  </div>
@endsection
