@include('layouts.common.css_links')

@extends('layouts.after_login_template')

@section('title')
    <h1>Add Student</h1>
    <div style=height:15px></div>
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

      <form action="{{ route('students.store') }}" method = "POST">
      @csrf

        @if ($errors->any())
              <ul>
                  @foreach ($errors->all() as $error)
                      <li style=color:darkred;background-color:pink>{{ $error }}</li>
                  @endforeach
              </ul>
      @endif

        <h4 style=position:relative;left:10;display:inline>First Name</h4>
        <h4 style=position:relative;left:190;display:inline>Last Name</h4>

        <div>
        <input class="first-name" type="text" name="firstname" style=width:280;display:inline>
        <input class="first-name" type="text" name="lastname" style=width:280;display:inline>
        </div>

        <h4>Email</h4>
        <input class="first-name" type="text" name="email">

        <div class="btn-block">
          <button type="submit">Save</button>
        </div>
      </form> 

   
    <a href="{{ route('students.index') }}"><button>Back</button></a>
@endsection





@include('layouts.common.js_links')


