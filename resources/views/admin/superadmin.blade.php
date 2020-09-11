@extends('adminlte::page')

@section('title', 'Famile Admin Panel')

@section('content_header')
@stop

@section('content')
<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Document</th>
      <th scope="col">Profile</th>
      <th scope="col">Created_at</th>
      <th scope="col">Action</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($documents as $document)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$document['document']}}</td>
      @foreach($users as $user)
      @if($user['id'] == $document['profile_id'])
      <td>{{$user['name']}}</td>
      @endif
      @endforeach
      <td>{{$document['created_at']}}</td>
      <td><a href="/admin/docview/{{$document['id']}}">View Details</a></td>
      <td>
        @if($document['completed'] == 0)
        <button style="border-radius: 4px;background-color: #FC608C;border: none;color: white;">Update Information</button>
        @else
        <i class="fa fa-check-circle" aria-hidden="true" style="color: #55F2CD;"></i>
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@stop

@section('css')
@stop

@section('js')
@stop