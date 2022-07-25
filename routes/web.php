<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;


Route::get('/', function () {
    return redirect()->route("products.index");
});
Route::get("/acerca-de", function () {
    return view("misc.acerca_de");
})->name("acerca_de.index");
Route::get("/soporte", function(){
    return redirect("https://parzibyte.me/blog/contrataciones-ayuda/");
})->name("soporte.index");

Auth::routes([
    "reset" => false,// no pueden olvidar contraseña
]);

Route::get('/home', 'HomeController@index')->name('home');
// Permitir logout con petición get
Route::get("/logout", function () {
    Auth::logout();
    return redirect()->route("home");
})->name("logout");


Route::get('ventas/pdf', [App\Http\Controllers\VentasController::class,"pdf"])->name('ventas.pdf');
Route::get('ventas/detalle/{venta}', [App\Http\Controllers\VentasController::class,"detalle"])->name('ventas.detalle');

Route::middleware("auth")
    ->group(function () {
        Route::resource("clientes", "ClientesController");
        Route::resource("usuarios", "UserController")->parameters(["usuarios" => "user"]);
        Route::resource("productos", "ProductosController");
        Route::resource("products", "ProductosController");
        Route::get("/ventas/ticket", "VentasController@ticket")->name("ventas.ticket");
        Route::resource("ventas", "VentasController");
        Route::get("/vender", "VenderController@index")->name("vender.index");
        Route::post("/productoDeVenta", "VenderController@agregarProductoVenta")->name("agregarProductoVenta");
        Route::delete("/productoDeVenta", "VenderController@quitarProductoDeVenta")->name("quitarProductoDeVenta");
        Route::post("/terminarOCancelarVenta", "VenderController@terminarOCancelarVenta")->name("terminarOCancelarVenta");
        Route::post("/actualizarProductoDeVenta", [App\Http\Controllers\VenderController::class, 'actualizarProductoDeVenta'])->name("actualizarProductoDeVenta");
        //Route::get('/products', "ProductosController")->name("products.index");
    });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products', "ProductosController@indexProducts")->name("products.index");
Auth::routes();
//Route::post('/products', "ProductosController")->parameters(["productos"=>"products"]);