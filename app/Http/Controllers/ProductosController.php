<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Expr\Cast\String_;
use Psy\Readline\Hoa\Console;

class ProductosController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = Http::get('https://APIFacturacionMongoDB.anthony-patrici.repl.co/products')->collect();
        //$respuesta->json();
        $products = $respuesta;
        return view("productos.productos_index", ["productos" => Producto::all()], ['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("productos.productos_create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $producto = new Producto($request->input());
        $producto->saveOrFail();
        $products = new Products($request->input());
        
        
        if ($request->hasFile('image')) {
            $image = $request->file('imagr');
            $teaser_image = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('Image');
            $image->move($destinationPath, $image);
            $products['image']= $image;
        }
        
        
        $cliente = Http::post('https://APIFacturacionMongoDB.anthony-patrici.repl.co/products' , $products
        //['json' => $request->input()]
        );
        //$respuesta->json();
        //$products = $respuesta;
        return redirect()->route("productos.index")->with("mensaje", "Producto guardado");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto, Products $products)
    {
        return view("productos.productos_edit", ["producto" => $producto,
        ],['producto'=>$products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto, Products $products)
    {
        $producto->fill($request->input());
        $producto->saveOrFail();
        $products->fill($request->input());
        (String) $id = $request->input('id');
        //echo($producto->{'id'});
        //dd($producto->{'id'});
        $cliente = Http::put('https://APIFacturacionMongoDB.anthony-patrici.repl.co/products/'.$id , $products
        //['json' => $request->input()]
        );
        //$respuesta->json();
        //$products = $respuesta;
        //dd($id);
        return redirect()->route("productos.index")->with("mensaje", "Producto actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        (String) $id = $producto->{'id'};
        //echo($id);
        $cliente = Http::delete('https://APIFacturacionMongoDB.anthony-patrici.repl.co/products/'.$id
        );
        return redirect()->route("productos.index")->with("mensaje", "Producto eliminado");
    }


    public function indexProducts()
    {
        $respuesta = Http::get('https://APIFacturacionMongoDB.anthony-patrici.repl.co/products')->collect();
        //$respuesta->json();
        $products = $respuesta;
        return view("products.products_index", ['products'=>$products]);
    }
}
