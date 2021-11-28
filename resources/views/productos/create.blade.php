
<form action="{{ url('/productos') }}" method="post" enctype="multipart/form-data">
   <!-- Llave de seguridad -->
        @csrf
        @include('productos.form', ['dat'=>'Crear'])
</form>
