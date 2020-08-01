@extends('adminlte::page')

@section('title', 'Famile Admin Panel')

@section('content_header')
@stop

@section('content')
<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Total Documents</th>
      <th scope="col">Uploaded At</th>
      <th scope="col">View</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($documents as $document)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$document['total_docs']}}</td>
      <td>{{$document['created_at']}}</td>
      <td><a href="/admin/doclists/{{$document['id']}}">View Details</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@stop

@section('css')
@stop

@section('js')
@stop