@include('layouts.common.css_links')



@extends('layouts.after_login_template')

@section('title')

@endsection


@section('table')

    @php
        $path = strval(\Illuminate\Support\Facades\Auth::user()->image);
    @endphp

    @if((session('message')!=''))
            <script type="text/javascript">alert("{{ session('message') }}");</script>
    @endif

        <img src="{{asset($path)}}"  style="border-radius: 50%; height:360px; width: 360px; object-fit: cover; margin-left: 400px; margin-bottom: 10px" alt="Avatar">


    <form action="{{route('profile.store')}}" style="margin-left: 720px; margin-top: -30px" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="button" id="loadFileXml" style="   border: 2px solid black; border-radius: 14px; background-color: #3CBC8D;;color: white;"
               value="Change Picture" onclick="document.getElementById('file').click();" />

        <input type="file" style="display:none;" id="file" onchange="form.submit()" name="image"/>
    </form>

    <form action="{{route('profile.delete')}}" method="POST">
        @csrf
        @method('DELETE')
        <button style="width: 120; margin-left: 855; margin-top: -39px;  "class="fa fa-trash" type="submit">Delete Image</button>
    </form>



    <div style="margin-left: 450px">
        <h4 style="margin-left: 90px; color: #2e6da4">Username</h4>
        <input style=width:280;border-radius:10px; value="{{\Illuminate\Support\Facades\Auth::user()->name}}" readonly>
        <h4 style="margin-left: 100px;color: #2e6da4">Email</h4>
        <input class="first-name" type="text" name="lastname" style=width:280px;border-radius:10px;display:inline value="{{\Illuminate\Support\Facades\Auth::user()->email}}" readonly>
    </div>


@endsection








@include('layouts.common.js_links')


