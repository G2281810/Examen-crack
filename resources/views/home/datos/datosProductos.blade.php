
<div class="form-label">
    Productos
</div>
<select class="form-select" id="productos_id">
    <option value="0">-- Selecciona un producto</option>
    @foreach ($productos as $producto)
        <option value="{{ $producto->id }}"> {{ $producto->Nombre }}</option>
    @endforeach
</select>

<script type="text/javascript">
    $(document).ready(function() {
        $('#productos_id').change(function() {
            var producto = $('#productos_id').val();
            console.log("Producto seleccionada:" + producto);
            //alert (producto); 
            if (producto == 0) {
                $("#formulario_id").empty();
            } else {
                $("#formulario_id").empty();
                $("#formulario_id").load("{{ route('Formulario') }}?id_producto=" + producto);
            }
        })
    });
</script>
