@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <h1>{{Request::is('home/nosotros')}}</h1>

@endsection