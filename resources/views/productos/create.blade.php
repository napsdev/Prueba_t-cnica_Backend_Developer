Creacion de productos

<form action="{{ url('/productos') }}" method="post" enctype="multipart/form-data">
   <!-- Llave de seguridad -->
        @csrf

<label for="nombre">Nombre</label>
<input type="text" name="nombre" id="nombre"> <br>

<label for="precio">Precio</label>
<input type="text" name="precio" id="precio"> <br>

<label for="descripcion">Descripción</label>
<input type="text" name="descripcion" id="descripcion"> <br>

<label for="cantidad">Cantidad</label>
<input type="text" name="cantidad" id="cantidad"> <br>

<label for="foto">Foto</label>
<input type="file" name="foto" id="foto"> <br>


<input type="submit" value="Enviar">



</form>
