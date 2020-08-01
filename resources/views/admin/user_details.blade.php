@extends('adminlte::page')

@section('title', 'Famile Admin Panel')

@section('content_header')
@stop

@section('content')
<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
      <th scope="col">Gender</th>
      <th scope="col">Blood</th>
      <th scope="col">Height</th>
      <th scope="col">Weight</th>
      <th scope="col">Occupation</th>
      <th scope="col">Mobile</th>
      <th scope="col">Email</th>
      <th scope="col">City</th>
      <th scope="col">State</th>
      <th scope="col">Address</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($profiles as $profile)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$profile['name']}}</td>
      <td>{{$profile['age']}}</td>
      <td>{{$profile['gender']}}</td>
      <td>{{$profile['blood_group']}}</td>
      <td>{{$profile['height']}}</td>
      <td>{{$profile['weight']}}</td>
      <td>{{$profile['occupation']}}</td>
      <td>{{$profile['phone']}}</td>
      <td>{{$profile['email']}}</td>
      <td>{{$profile['city']}}</td>
      <td>{{$profile['state']}}</td>
      <td>{{$profile['address']}}</td>
      <td><a href="/admin/doc/{{$profile['id']}}">View Documents</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@stop

@section('css')
@stop

@section('js')
@stop