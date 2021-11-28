<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['productos']=producto::paginate(5);
        return view('productos.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //obtener todos los datos menos token.
        $datosproducto = request()->except('_token');
        //Imagen del producto
        if ($request->hasFile('foto')) {
            $datosproducto['foto']=$request->file('foto')->store('uploads', 'public');
        }

        producto::insert($datosproducto);
        return redirect('productos')->with('mensaje', 'Producto añadido');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pro = producto::findOrFail($id);
        return view('productos.edit', compact('pro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosproducto = request()->except(['_token', '_method']);

        if ($request->hasFile('foto')) {
            $pro = producto::findOrFail($id);

            Storage::delete('public/'.$pro->foto);

            $datosproducto['foto']=$request->file('foto')->store('uploads', 'public');
        }

        producto::where('id', '=' , $id)->update($datosproducto);
        $pro = producto::findOrFail($id);
        return view('productos.edit', compact('pro'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pro = producto::findOrFail($id);
        if(Storage::delete('public/'.$pro->foto)){
            producto::destroy($id);
        }

        return redirect('productos')->with('mensaje', 'Producto eliminado');
    }
}
