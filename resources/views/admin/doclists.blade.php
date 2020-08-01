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
      <th scope="col">Uploaded At</th>
      <th scope="col">View</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($documents as $document)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$document['document']}}</td>
      <td>{{$document['created_at']}}</td>
      <td><a href="/admin/docview/{{$document['id']}}">View Details</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@stop

@section('css')
@stop

@section('js')
@stop