@extends('layouts.dashboard.dashboard')

@section('title')
    <h1>Homepage</h1>
@endsection


@section('table')
    <div style=position:absolute;top:40%;left:10%;>
        <img src="{{asset('images/books.png')}}" alt="">
    </div>
    <div style=position:absolute;top:490%;left:60%;>
        <h1 style=font-size:3em;font-weight:bolder;color:white>No table selected</h1>
    </div>
@endsection


