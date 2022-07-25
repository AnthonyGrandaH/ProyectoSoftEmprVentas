<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use PDO;
use PDOException;

$opciones = [PDO::ERRMODE_EXCEPTION];


class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("clientes.clientes_index", ["clientes" => Cliente::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("clientes.clientes_create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            (new Cliente($request->input()))->saveOrFail();

            $request->validate([
                'nombre' => 'required|regex:/^[A-Z,a-z, ,á,í,é,ó,ú,ñ]+$/|max:50',
                'cedula' => 'nullable|min:10|max:10|regex:/^[E,0-9,-]+$/|unique:clientes',
                'telefono' => 'nullable|min:10|max:10|regex:/^[0-9]{7,8}$/|unique:clientes',
                'email' => 'nullable|email|max:100|unique:clientes',

            ]);

            return redirect()->route("clientes.index")->with("mensaje", "Cliente agregado");
        } catch (PDOException $ex) {
            return redirect()->route("clientes.index")->with([
                "mensaje" => "El cliente no fue registrado porque ya existe",
                "tipo" => "danger"
            ]);;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view("clientes.clientes_edit", ["cliente" => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $cliente->fill($request->input());
        $cliente->saveOrFail();
        return redirect()->route("clientes.index")->with("mensaje", "Cliente actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route("clientes.index")->with("mensaje", "Cliente eliminado");
    }
}
