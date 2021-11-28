
<label for="nombre">Nombre</label>
<input type="text" name="nombre" id="nombre" required value="@isset($pro) {{ $pro->nombre }} @endisset"> <br>

<label for="precio">Precio</label>
<input type="number" name="precio" id="precio" required value="@isset($pro){{ $pro->precio }}@endisset"> <br>

<label for="descripcion">Descripción</label>
<input type="text" name="descripcion" id="descripcion" required value="@isset($pro) {{ $pro->descripcion }} @endisset"> <br>

<label for="cantidad">Cantidad</label>
<input type="number" name="cantidad" id="cantidad" required value="@isset($pro){{ $pro->cantidad }}@endisset"> <br>

@isset($pro)
<img src="{{ asset('storage').'/'.$pro->foto }}" alt="{{ $pro->nombre }}" width="200px">
@endisset

<label for="foto">Foto</label>
<input type="file" name="foto" id="foto"  value=""> <br>


<input type="submit" value="{{$dat}} producto">
<a href="{{ url('productos') }}"> Regresar </a>
