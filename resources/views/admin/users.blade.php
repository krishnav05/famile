@extends('adminlte::page')

@section('title', 'Famile Admin Panel')

@section('content_header')
@stop

@section('content')
<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Phone</th>
      <th scope="col">Message</th>
      <th scope="col">Send Notification</th>
      <th scope="col">Profiles</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($users as $user)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$user['phone']}}</td>
      <form method="post" action="/admin/sendmessage">
        <input type="hidden" value="{{$user['phone']}}" name="phone">
      <td><input type="text" name="pushnotification"></td>
      <td><button type="submit" class="btn btn-outline-dark">Send</button></td>  
      </form>
      
      <td>1</td>
      <td><a href="/admin/user/{{$user['id']}}">View Details</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@stop

@section('css')
@stop

@section('js')
@stop