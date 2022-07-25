
@extends("maestra")
@section("titulo", "Agregar producto")
@section("contenido")
    <div class="row">
        <div class="col-12">
            <h1>Agregar producto</h1>
            <form method="POST" action="{{route("productos.store")}}">
                @csrf
                <div class="form-group">
                    <label class="label">Código de barras</label>
                    <input required autocomplete="off" name="codigo_barras" class="form-control"
                           type="text" placeholder="Código de barras">
                </div>
                <div class="form-group">
                    <label class="label">Nombre Producto</label>
                    <input required autocomplete="off" name="nombre" class="form-control"
                           type="text" placeholder="Nombre Producto">
                </div>
                <div class="form-group">
                    <label class="label">Descripción</label>
                    <input required autocomplete="off" name="descripcion" class="form-control"
                           type="text" placeholder="Descripción">
                </div>
                <div class="form-group">
                    <label class="label">Valor Inc. IVA</label>
                    <input required autocomplete="off" name="precio_venta" class="form-control"
                           type="decimal(9,2)" placeholder="Valor Inc. IVA">
                </div>
                <div class="form-group">
                    <label class="label">Cantidad Existencia</label>
                    <input required autocomplete="off" name="existencia" class="form-control"
                           type="int" placeholder="Cantidad Existencia">
                </div>
                <div class="form-group">
                    <label class="label">Imagen</label>
                    <input name="image" class="form-control"
                           type="file" placeholder="Imagen">
                </div>
                <div class="form-group">
                    <label class="label">URL Imagen</label>
                    <input required autocomplete="off" name="imageUrl" class="form-control"
                           type="text" placeholder="URL Imagen">
                </div>
                @include("notificacion")
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("productos.index")}}">Volver al listado</a>
            </form>
        </div>
    </div>
@endsection
