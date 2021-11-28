@extends('layouts.app')

@section('content')
<div class="container">


@if (Session::has('mensaje'))
{{ Session::get('mensaje') }}
@endif

<a href="{{ url('productos/create') }}"> Crear un producto </a>
<table class="table table-dark">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Foto</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nombre }}</td>
            <td>{{ $item->precio }}</td>
            <td>{{ $item->descripcion }}</td>
            <td>{{ $item->cantidad }}</td>
            <td>
                <img src="{{ asset('storage').'/'.$item->foto }}" alt="{{ $item->nombre }}" width="100px">
            </td>
            <td>
                <a href="{{ url('/productos/'.$item->id.'/edit') }}">Editar</a>
                <form action="{{ url('/productos/'.$item->id) }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" value="Borrar" onclick="return confirm('¿Quieres eliminar el producto?')">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
