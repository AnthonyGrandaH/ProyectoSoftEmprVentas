@extends("maestra")
@section("titulo", "Productos")
@section("contenido")
<div class="row">
    <div class="col-sm-6">
        <h1>Productos <i class="fa fa-box"></i></h1>
        @include("notificacion")
        <div class="row">
            @foreach($products as $products)
            <div class="card">
                <div class="card-body">


                    <ul class="list-group">
                        <li class="list-group-item"><img src="{{$products['imageUrl']}}" width="200" height="200" /></a></li>
                        <li class="list-group-item list-group-item-info">{{$products['codigo_barras']}}</li>
                        <li class="list-group-item list-group-item-warning">{{$products['nombre']}}</li>
                        <li class="list-group-item">{{$products['descripcion']}}</li>
                        <li class="list-group-item list-group-item-dange">{{$products['precio_venta']}}</li>
                    </ul>
                    </br>


                </div>
            </div>


            @endforeach
        </div>
    </div>
</div>
@endsection