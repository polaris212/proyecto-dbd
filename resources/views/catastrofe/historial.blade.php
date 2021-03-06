@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-11 col-md-offset-1">
    	<div class="panel panel-default">
        <div class="panel-heading">Catastrofes</div>
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Nombre de catastrofe</th>
      <th scope="col">Fecha</th>
      <th scope="col">Tipo</th>
      <th scope="col">Lugar</th>
      <th scope="col">Medidas</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($catastrofes as $catastrofe)
    <tr>
      <td>{{ $catastrofe->nombre }}</td>
      <td>{{ $catastrofe->fecha }}</td>
      <td>{{ $catastrofe->tipo }}</td>
      <td>{{ $catastrofe->lugar }}</td>

      <td><a href="/catastrofes/medidas/{{$catastrofe->id}}">Ver medidas asociadas</a></td>
      <td><a class="btn btn-success" href="/catastrofes/{{$catastrofe->id}}">Ver</a>
        @if(Auth::user()->authorizeRoles(['admin','gobierno',]))
      <a class="btn btn-primary" href="/catastrofes/{{ $catastrofe->id }}/edit">Editar</a>
      <a class="btn btn-danger" href="/catastrofes/{{$catastrofe->id}}/delete">Eliminar</a>
    @endif</td>
    </tr>
    @endforeach  
</tbody>
</table>
</div>
</div>
</div>
</div>
@endsection