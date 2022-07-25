
@extends("maestra")
@section("titulo", "Editar producto")
@section("contenido")
    <div class="row">
        <div class="col-12">
            <h1>Editar producto</h1>
            <form method="POST" action="{{route("productos.update", [$producto], [$producto])}}">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label class="label">Código</label>
                    <input required value="{{$producto->id}}" autocomplete="off" name="id"
                           class="form-control"
                           type="label" placeholder="Id" readonly="readonly">
                </div>
                <div class="form-group">
                    <label class="label">Código de barras</label>
                    <input required value="{{$producto->codigo_barras}}" autocomplete="off" name="codigo_barras"
                           class="form-control"
                           type="text" placeholder="Código de barras">
                </div>
                <div class="form-group">
                    <label class="label">Nombre Producto</label>
                    <input required value="{{$producto->nombre}}" autocomplete="off" name="nombre"
                           class="form-control"
                           type="text" placeholder="Nombre Producto">
                </div>
                <div class="form-group">
                    <label class="label">Descripción</label>
                    <input required value="{{$producto->descripcion}}" autocomplete="off" name="descripcion"
                           class="form-control"
                           type="text" placeholder="Descripción">
                </div>
                <div class="form-group">
                    <label class="label">Precio de venta</label>
                    <input required value="{{$producto->precio_venta}}" autocomplete="off" name="precio_venta"
                           class="form-control"
                           type="decimal(9,2)" placeholder="Precio de venta">
                </div>
                <div class="form-group">
                    <label class="label">Existencia</label>
                    <input required value="{{$producto->existencia}}" autocomplete="off" name="existencia"
                           class="form-control"
                           type="decimal(9,2)" placeholder="Existencia">
                </div>
                <div class="form-group">
                    <label class="label">Imagen</label>
                    <input  name="image" class="form-control"
                           type="file" placeholder="Imagen">
                </div>
                <div class="form-group">
                    <label class="label">URL Imagen</label>
                    <input required autocomplete="off" name="imageUrl" class="form-control"
                           type="text" placeholder="URL Imagen">
                </div>

                @include("notificacion")
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("productos.index")}}">Volver</a>
            </form>
        </div>
    </div>
@endsection
