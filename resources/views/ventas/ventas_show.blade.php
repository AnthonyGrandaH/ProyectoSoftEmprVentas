@extends("maestra")
@section("titulo", "Detalle de venta ")
@section("contenido")
<div class="row">
    <div class="col-12">
        <h1>Detalle de venta #{{$venta->id}}</h1>
        <h1>Cliente: <small>{{$venta->id_cliente}}</small></h1>
        @include("notificacion")
        <a class="btn btn-info" href="{{route("ventas.index")}}">
            <i class="fa fa-arrow-left"></i>&nbsp;Volver
        </a>
        <a href="{{route("ventas.detalle", $venta)}}" )}}" class="btn btn-primary btn-sm" data-placement="left">
            {{__("PDF")}}
        </a>
        <h2>Productos</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Código de barras</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($venta->productos as $producto)
                <tr>
                    <td>{{$producto->descripcion}}</td>
                    <td>{{$producto->codigo_barras}}</td>
                    <td>${{number_format($producto->precio, 2)}}</td>
                    <td>{{$producto->cantidad}}</td>
                    <td>${{number_format($producto->cantidad * $producto->precio, 2)}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td><strong>Total</strong></td>
                    <td>${{number_format($total, 2)}}</td>
                </tr>
            </tfoot>
        </table>

    </div>
</div>
@endsection