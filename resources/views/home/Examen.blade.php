<!DOCTYPE html>
<html lang="es-MX">

<head>
<link rel="stylesheet" href="https://bootswatch.com/5/cyborg/bootstrap.min.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Examen</title>
    <div class="container mt-2">
        <div class="card">
            <div class="card-body bg-primary mt-2 ">
                <h2 class="card-title">Examen</h2>
                <p class="card-text"></p>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
   
    
</head>

<body>
<div class="container mt-3 ">
        <div class="card mb-3">
            <div class="card-body
                <div class="center">
                    <table class="tb">
                        <tr>
                            <td>
                                <div class="form-label">
                                    Tiendas:
                                </div>
                                <select class="form-select" id="tienda_id">
                                    <option value="0">--Seleccione una tienda--</option>
                                    @foreach ($Tiendas as $tienda)
                                        <option value="{{ $tienda->id }}">{{ $tienda->Nombre_Tienda }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>&nbsp
                                <img src="{{ asset('img/default-profile.png') }}" alt="Imagen" height="100" id="imagen_tienda">
                            </td>
                        </tr>
                        <tr><br><br>
                            <td> <br><br>
                                <div class="form-label">Empleado:</div>
                                <select class="form-select" id="empleado_id">
                                    <option value="">-- Selecciona un empleado --</option>
                                </select>
                            </td>
                            <td><img src="{{ asset('img/default-placeholder.png') }}" alt="Imagen" height="100"
                                    id="imagen_empleado"></td>
                                <td>
                                    <div id="producto_id"> </div>
                            </td>
                        <td>
                                <div id="formulario_id"> </div>
                            </td>
                        </tr>
                    </table>
                    <h2 class="form-label">Ventas</h2>
                    <table class="table table-hover" class="form-control" border="1">
                        <tr class="table-primary">
                            <th>#</th>
                            <th>Fecha</th>
                            <th>Tienda</th>
                            <th>Vendedor</th>
                            <th>Producto</th>
                            <th>Costo</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                        </tr>
                        @php($number = 1)
                        @foreach ($ventas as $venta)
                            <tr>
                                <td> {{ $number }} @php($number = $number + 1)</td>
                                <td>{{ $venta->Fecha }}</td>
                                <td>{{ $venta->Tienda_Id }}</td>
                                <td>{{ $venta->Usuarios_Id }}</td>
                                <td>{{ $venta->Producto_id }}</td>
                                <td>{{ $venta->Cantidad }}</td>
                                <td>{{ $venta->Total }}</td>
                            </tr>
                        @endforeach
            
                    </table>
                </div>
            </div>
        </div>
    </div>
    @csrf
</body>
<script>
    $(document).ready(function() {
        $('#tienda_id').change(function() {
            var valtienda = $('#tienda_id').val();
            console.log("Tienda seleccionada: " + valtienda);
            if (valtienda == 0) {
                $('#empleado_id').html(
                    ' <select name="tienda" id="tienda_id"> <option value = "0" > -- Selecciona un empleado --'
                );
                $('#imagen_tienda').attr("src", 'img/default-placeholder.png');
            } else {
                $('#empleado_id').empty();
                $('#empleado_id').load("{{ route('datosEmpleados') }}?id_empleado=" + valtienda)
                    .serialize();


                var url = "/FotoTienda";

                var formData = new FormData();
                formData.append('_token', $('input[name=_token]').val());
                formData.append('id_tienda', valtienda);

                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    processData: false, // tell jQuery not to process the data
                    contentType: false, // tell jQuery not to set contentType
                    success: function(data) {

                        $("#imagen_tienda").attr("src", "img/" + data);

                    },
                    error: function(e) {
                        console.log(e);
                    }

                });



            }

        });
    });
</script>

</html>

<!--Css-->
<style>
    h2{
        text-align: center;
    }
    
</style>
