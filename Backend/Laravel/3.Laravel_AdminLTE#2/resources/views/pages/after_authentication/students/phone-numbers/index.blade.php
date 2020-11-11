@include('layouts.common.css_links')

@extends('layouts.after_login_template')

@section('title')
    <h1 style="color: #fa6362">Edit Student  {{$student->firstname}} {{$student->lastname}} Phone Numbers</h1>
    <div style=height:15px></div>
    <a href="{{route('student.phone.create', [$student->id])}}" class="btn btn-success" style="margin-bottom:1;margin-left: 10">Add Phone Number</a>
@endsection


@section('table')
    <style>
        html, body {
            min-height: 100%;
        }
        body, div, form, input, p {

        }
        h1 {
            font-weight: 400;
        }
        h4 {
            margin: 22px 0 4px;
            color: #095484;
        }
        .testbox {
            display: flex;
            justify-content: center;
            align-items: center;
            height: inherit;
            padding: 3px;
        }
        form {
            width: 100%;
            padding: 20px;


        }
        input {
            width: calc(100% - 10px);
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            vertical-align: middle;
        }
        input:hover, textarea:hover {
            outline: none;
            border: 1px solid #095484;
        }
        .first-name {
            margin-bottom: 22px;
        }
        span {
            color: red;
        }
        th, td {
            width: 21%;
            padding: 15px 0;
            border-bottom: 1px solid #ccc;
            text-align: center;
            vertical-align: unset;
            line-height: 18px;
            font-weight: 400;
            word-break: break-all;
        }
        .first-col {
            width: 16%;
            text-align: left;
        }
        table {
            width: 100%;
        }
        textarea {
            width: calc(100% - 6px);
        }
        .btn-block {
            margin-top: 20px;
            text-align: center;
        }
        button {
            width: 150px;
            padding: 10px;
            border: none;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            background-color: #095484;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
        }
        button:hover {
            background-color: #0666a3;
        }
        @media (min-width: 568px) {
            th, td {
                word-break: keep-all;
            }
        }
    </style>

@section('table')

            @if(count($phones)!=0)
                <h4>Phone Numbers</h4>
            <ul>
                @foreach($phones as $phone)
                    <li>
                        <input type="text" name="phones[{{$phone->id}}]" value="{{$phone->number}}" style=width:260;display:inline readonly>

                        <div style="margin-top: 10;margin-bottom: 50">
                            <a href="{{route('student.phone.edit_specific', [$student->id, $phone->id])}}" class="btn btn-primary" style="margin-bottom: 2">Change Phone Number</a>

                            <form action="{{route('student.phone.destroy',[$student->id, $phone->id])}}" method="POST" style=display:inline>
                                @csrf
                                @method('DELETE')
                                <button class ="btn btn-danger" type="Submit">Delete</button></a>
                            </form>
                        </div>

                    </li>
                @endforeach
            </ul>
            <div>
                {{$phones->withQueryString()->links('pagination::simple-bootstrap-4')}}
            </div>
        @endif



    <div style="margin-top: 20"><a href="{{ route('students.edit', $student->id) }}"><button>Back</button></a></div>


@endsection





@include('layouts.common.js_links')


