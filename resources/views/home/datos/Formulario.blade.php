&nbsp<div class="form-label">
    Formulario Ventas del {{ $producto->Nombre }} {{ $producto->Codigo }}
</div>
<div>
    Costo(c/u):{{ $producto->Costo }}
    <input type="hidden" id="costo_id" value="{{ $producto->Costo }}">
</div>
<div>
    Total:
    <div id="total_id">

    </div>
</div>
<div>
    <img src="{{ asset('img/default-placeholder.png') }}" alt="Imagen" height="100" id="imagen_producto">
</div>
<div>
    Cantidad
    <input class="form-control" type="number" id="cantidad_id">
</div><br>
<div>
    @csrf
    <button class="btn btn-outline-success" id="submit">Realizar Venta</button>
</div>

<script>
    $(document).ready(function() {

        var url = "/FotoProducto";

        var producto = $('#productos_id').val()

        var formData = new FormData();
        formData.append('_token', $('input[name=_token]').val());
        formData.append('id_producto', producto);

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            success: function(data) {

                $("#imagen_producto").attr("src", "img/" + data);

            },
            error: function(e) {
                console.log(e);
            }

        });


        $("#cantidad_id").change(function() {
            var cantidad = $("#cantidad_id").val();
            var costo = $("#costo_id").val();
            console.log(cantidad);
            console.log(costo);
            $("#total_id").html(cantidad * costo);
        });

        $('#submit').click(function() {
            var url = "/CrearVenta";

            let date = new Date();
            let output = date.getFullYear() + '-' + String(date.getMonth() + 1)
                .padStart(2, '0') + '-' + String(date.getDate()).padStart(2, '0');

            var id_producto = $("#productos_id").val();
            var id_usuario = $("#empleado_id").val();
            var id_tienda = $("#tienda_id").val();
            var costo = $("#costo_id").val();
            var cantidad = $("#cantidad_id").val();
            var total = cantidad * costo;

            var formData = new FormData();
            formData.append('_token', $('input[name=_token]').val());
            formData.append('fecha', output);
            formData.append('id_tienda', id_tienda);
            formData.append('id_usuario', id_usuario);
            formData.append('id_producto', id_producto);
            formData.append('total', total);
            formData.append('cantidad', cantidad);

            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                processData: false, // tell jQuery not to process the data
                contentType: false, // tell jQuery not to set contentType
                success: function(data) {

                    setTimeout(function() {
                        location.reload(true);
                    }, 1000);

                },
                error: function(e) {
                    console.log(e);
                }

            });

        });
    });
</script>
