@extends("maestra")
@section("titulo", "Agregar cliente")
@section("contenido")
<div class="row">
    <div class="col-12">
        <h1>Agregar cliente</h1>
        <form method="POST" action="{{route("clientes.store")}}">
            @csrf
            <div class="form-group">
                <label class="label">Cédula</label>
                <input required autocomplete="off" name="cedula" class="form-control" type="text" placeholder="Cédula" value="{{ old('cedula') }}">
                @error('cedula')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label class="label">Nombre</label>
                <input required autocomplete="off" name="nombre" class="form-control" type="text" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label class="label">Teléfono</label>
                <input required autocomplete="off" id="telefono" name="telefono" class="form-control" type="text" placeholder="Teléfono" value="{{ old('telefono') }}">
                @error('telefono')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label class="label">Email</label>
                <input required autocomplete="off" name="email" class="form-control" type="text-area" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="label">Dirección</label>
                <input required autocomplete="off" name="direccion" class="form-control" type="text-area" placeholder="Dirección">
            </div>

            @include("notificacion")
            <button class="btn btn-success">Guardar</button>
            <a class="btn btn-primary" href="{{route("clientes.index")}}">Volver al listado</a>
        </form>
    </div>
</div>
@endsection