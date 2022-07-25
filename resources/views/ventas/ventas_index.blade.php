@extends("maestra")
@section("titulo", "Ventas")
@section("contenido")
<div class="row">
    <div class="col-12">
        <h1>Ventas <i class="fa fa-list"></i></h1>
        @include("notificacion")

        <a  href="{{route("ventas.pdf")}}"
             class="btn btn-primary btn-sm" data-placement="left">
             {{__("PDF")}}
        </a>



        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th>Detalles</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ventas as $venta)
                    <tr>
                        <td>{{$venta->created_at}}</td>
                        <td>{{$venta->id_cliente}}</td>
                        <td>${{number_format($venta->total, 2)}}</td>
                        <td>
                            <a class="btn btn-success" href="{{route("ventas.show", $venta)}}">
                                <i class="fa fa-info"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{route("ventas.destroy", [$venta])}}" method="post">
                                @method("delete")
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
