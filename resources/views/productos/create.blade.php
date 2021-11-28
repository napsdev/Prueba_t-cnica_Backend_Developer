@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/productos') }}" method="post" enctype="multipart/form-data">
   <!-- Llave de seguridad -->
        @csrf
        @include('productos.form', ['dat'=>'Crear'])
</form>
</div>
@endsection
