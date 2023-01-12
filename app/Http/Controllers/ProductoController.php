<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProductoController extends Controller
{
  
    public function index()
    {
        $productos = Producto::all();
        return view('producto.index',compact('productos'));
    }

    public function create()
    {
        return view('producto.create');
    }

    public function store(Request $request)
    {
        // dd($request);
              $file = request()->file('imagen');
              $obj = Cloudinary::upload($file->getRealPath(),['folder'=>'products']);
              $public_id = $obj->getPublicId();
              $url = $obj->getSecurePath();

        Producto::create([
            "nombre"=>$request->nombre,
            "url"=>$url,
            "public_id"=>$public_id,
            "descripcion"=>$request->descripcion
        ]);

        return redirect('/producto');
    }

  
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        $url = $producto->url;
        $public_id = $producto->public_id;

        if($request->hasFile('imagen')){
            Cloudinary::destroy($public_id);
            $file = request()->file('imagen');
            $obj = Cloudinary::upload($file->getRealPath(),['folder'=>'products']);
            $url = $obj->getSecurePath();
            $public_id = $obj->getPublicId();
        }

        $producto->update([
            "nombre"=>$request->nombre,
            "descripcion"=>$request->descripcion,
            "url"=>$url,
            "public_id"=>$public_id
        ]);
        return redirect('/producto');
    }

  
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $public_id = $producto->public_id;
        Cloudinary::destroy($public_id);
        Producto::destroy($id);
        return redirect('/producto');
    }
}
