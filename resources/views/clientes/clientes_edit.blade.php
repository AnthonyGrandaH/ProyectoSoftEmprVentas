
@extends("maestra")
@section("titulo", "Editar cliente")
@section("contenido")
    <div class="row">
        <div class="col-12">
            <h1>Editar cliente</h1>
            <form method="POST" action="{{route("clientes.update", [$cliente])}}">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label class="label">Cédula</label>
                    <input required value="{{$cliente->nombre}}" autocomplete="off" name="cedula" class="form-control"
                           type="text" placeholder="Cédula">
                </div>
                <div class="form-group">
                    <label class="label">Nombre</label>
                    <input required value="{{$cliente->nombre}}" autocomplete="off" name="nombre" class="form-control"
                           type="text" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label class="label">Teléfono</label>
                    <input required value="{{$cliente->telefono}}" autocomplete="off" name="telefono"
                           class="form-control"
                           type="text" placeholder="Teléfono">
                </div>
                <div class="form-group">
                    <label class="label">Email</label>
                    <input required autocomplete="off" name="email" class="form-control"
                           type="text-area" placeholder="Email">
                </div>

                <div class="form-group">
                    <label class="label">Dirección</label>
                    <input required autocomplete="off" name="direccion" class="form-control"
                           type="text-area" placeholder="Dirección">
                </div>

                @include("notificacion")
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("clientes.index")}}">Volver</a>
            </form>
        </div>
    </div>
@endsection
