@include('layouts.common.css_links')

@extends('layouts.after_login_template')

@section('title')
    <h1>Students List</h1>
    <div style=height:25px></div>
@endsection


@section('table')
<form method="GET" action="{{route('students.search')}}">
    <input name="search" type="search" placeholder="Search..." autofocus  value = "{{ request()->query('search') }}"/>
    <button type="submit" class ="btn-danger" style=border-radius:16px;>Go</button>
</form>

<table class="w3-table-all w3-medium" style= margin-left:auto;margin-right:auto;width:160%>
                  <thead>
                    <tr class = w3-indigo>
                      <th style="width: 10px">id</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($students as $student)
                    <tr class = w3-hover-blue>
                      <td>{{$student->id}}</td>
                      <td>{{$student->firstname}}</td>
                      <td>{{$student->lastname}}</td>
                      <td>{{$student->email}}</td>
                      <td>
                          <a class = "btn btn-primary" href="{{route('students.show', $student->id)}}">Show</a>
                          <a class = "btn btn-info" href="{{route('students.edit', $student->id)}}">Edit</a>
                          <form action="{{route('students.destroy',$student->id)}}" method="POST" style=display:inline>
                              @csrf
                              @method('DELETE')
                              <button class ="btn btn-danger" type="Submit">Delete</button></a>
                          </form>

                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
@endsection



<!-- delete this section and the GUI works fine -->
@section('paginators')
<div style=height:7px></div>

@php
    \Illuminate\Pagination\Paginator::useBootstrap();
@endphp


<div>{{$students->withQueryString()->links()}}</div>
<div style=height:10px></div>
<div>Search results: {{$students->total()}} items</div>
<div style=height:10px></div>
<div><a class = "btn btn-primary" href="{{route('home')}}">Back to Homepage</a></div>
@endsection




@include('layouts.common.js_links')


