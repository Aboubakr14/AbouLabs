@extends('templates.index')

@section('head')
    @include('templates.head')
@endsection

@section('header')
    @include('templates.header')
@endsection

@section('chemin')
    @include('templates.chemin')
@endsection

@section('contenu')
    <!-- Google map -->
    @if ($errors->any())
        <div class="alert alert-danger" id="msg">
            <div>
                <button type="button" class="ml-2 mb-1 close" id="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </div>
    @endif
	<div class="map" id="map-area">
        <iframe src="https://www.google.com/maps/place/Manneken+Pis/@50.844993,4.3478003,17z/data=!3m1!4b1!4m5!3m4!1s0x47c3c479195e3dd1:0x17b840a620b0c11f!8m2!3d50.844993!4d4.349989" width="1920" height="750" frameborder="0" allowfullscreen="" class="d-block img-fluid h-100"></iframe>
    </div>
@endsection

@section('contact')
    <!-- Contact section -->
    <div class="contact-section spad fix">
        <div class="container">
            <div class="row">
                @include('templates.contact')
                @include('templates.form')
            </div>
        </div>
    </div>
    <!-- Contact section end-->
@endsection

@section('footer')
    @include('templates.footer')
@endsection1