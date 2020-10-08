@include('layouts.common.css_links')

@extends('layouts.after_login_template')

@section('title')
    <h1>Instructors List</h1>
    <div style=height:25px></div>
@endsection



@section('table')


<form method="GET" action="{{route('instructors.search')}}">
    <input name="search" type="search" placeholder="Search..." autofocus value = "{{ request()->query('search') }}"/>
    <button type="submit" class ="btn-danger" style=border-radius:16px;>Go</button>
    <a class = "btn btn-secondary" href="{{route('instructors.index')}}">Reset</a>
</form>


<table class="w3-table-all w3-medium" style= margin-left:auto;margin-right:auto;width:160%>
                  <thead>
                    <tr class = w3-indigo>
                      <th style="width: 10px">id</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Occupation</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($instructors as $instructor)
                    <tr class = w3-hover-blue>
                      <td>{{$instructor->id}}</td>
                      <td>{{$instructor->firstname}}</td>
                      <td>{{$instructor->lastname}}</td>
                      <td>{{$instructor->email}}</td>
                      <td>{{$instructor->occupation}}</td>
                      <td>
                          <a class = "btn btn-primary" href="{{route('instructors.show', $instructor->id)}}">Show</a>
                          <a class = "btn btn-info" href="{{route('instructors.edit', $instructor->id)}}">Edit</a>
                          <form action="{{route('instructors.destroy',$instructor->id)}}" method="POST" style=display:inline>
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
<div>{{$instructors->withQueryString()->links('pagination::bootstrap-4')}}</div>
<div style=height:10px></div>
<div>Search results: {{$instructors->total()}} Instructors</div>
<div style=height:10px></div>
@endsection




@include('layouts.common.js_links')


