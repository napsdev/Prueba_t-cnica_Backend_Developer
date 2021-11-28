<form action="{{ url('/productos/'.$pro->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}
    @include('productos.form', ['dat'=>'Modificar'])
</form>
