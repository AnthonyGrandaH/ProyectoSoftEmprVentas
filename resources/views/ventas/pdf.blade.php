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
    <header>
        <div class="row">
            <div class="col-12">
                <h1>Ventas <i class="fa fa-list"></i></h1>
                @include("notificacion")
                <div class="table-responsive">
                    <table class="table table-bordered" style="width: 100%; margin-top: 10px;">
                        <thead class="superior" style="height: 150px;">
                            <tr style="height: 150px;">
                                <th>Fecha/Hora</th>
                                <th>Cliente</th>
                                <th>Total</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ventas as $venta)
                            <tr>
                                <td scope="row" style="text-align: center;">{{$venta->created_at}}</td>
                                <td scope="row" style="text-align: center;">{{$venta->id_cliente}}</td>
                                <td scope="row" style="text-align: center;">${{number_format($venta->total, 2)}}</td>


                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </header>
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
