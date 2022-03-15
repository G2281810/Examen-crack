<option value="0">-- Selecciona un empleado</option>

@foreach ($empleados as $empleado)
    <option value="{{ $empleado->id }}"> {{ $empleado->Nombre }}</option>
@endforeach


<script type="text/javascript">
    $(document).ready(function() {
        $("#empleado_id").change(function() {
            var valtienda = $('#tienda_id').val();
            var empleado = $("#empleado_id").val();
            console.log("Empleado seleccionada:" + empleado);
            if (empleado == 0) {
                $("#producto_id").empty();
                $("#imagen_empleado").attr("src", 'img/default-placeholder.png');
            } else {
                $("#producto_id").empty();
                $("#producto_id").load("{{ route('datosProductos') }}?id_producto=" + valtienda);

                var url = "/FotoEmpleado";

                var formData = new FormData();
                formData.append('_token', $('input[name=_token]').val());
                formData.append('id_empleado', empleado);

                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    processData: false, // tell jQuery not to process the data
                    contentType: false, // tell jQuery not to set contentType
                    success: function(data) {

                        $("#imagen_empleado").attr("src", "img/" + data);

                    },
                    error: function(e) {
                        console.log(e);
                    }

                });
            }
        })
    });
</script>
