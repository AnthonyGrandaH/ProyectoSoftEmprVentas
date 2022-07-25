<!DOCTYPE html>
<html lang="es">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Reporte de ventas</title>
{{-- <link rel="stylesheet" href="{{ asset('public/css/app.css') }}" type="text/css"> --}}
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> --}}


<style>
    body {
        font-family: Arial, sans-serif;
        font-size: 14px;
    }

    .datos {
        margin-top: -120px;
        width: 100%;
    }

    /* .izquierda {

        margin-left: 10px;
    } */

    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 40px;
    }

    .superior {
        background: #1f78ac;
        color: white;
        height: 150px;
    }
</style>



<body>
    <section style="top: 0px;">
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td colspan="2" style="text-align: center">
                    <span style="font-size: 25px; font-weight: bold; ">Sistema de Soft-Empresarial</span>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top; padding-top:0px; position: relative; width: 20%;">
                    <img style="width: 200px; align-content: center" src="imagen/logo-soft-reporte.png" alt="logo-reporte.png" width="100" height="62">
                </td>
                <td style="vertical-align: top; padding-top: 0px; width: 80%;">
                    <h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size: 23px;">
                        Reporte de Ventas</h2>

                </td>
            </tr>
        </table>
    </section>

        <div class="row">
            <div class="col-12">
                <h1>Detalle de venta #{{$venta->id}}</h1>
                
                @include("notificacion")

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

    <section class="footer text-dark">
        <table cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td width="60" style="text-align: center">
                    Soft-Empresarial
                </td>

            </tr>
        </table>
    </section>
</body>

</html>
