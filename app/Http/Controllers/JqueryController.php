<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Tienda;
use App\Models\Usuario;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JqueryController extends Controller
{
    
    function vista()
    {
        $tienda = Tienda::all();
        $ventas = Venta::all();

        return view("home.Examen")
            ->with(['Tiendas' => $tienda])
            ->with(['ventas' => $ventas]);
    }



    function datosEmpleados(Request $request)
    {
        $id_empleado = $request->get('id_empleado');
        $empleados = Usuario::where('Tiendas_id', $id_empleado)->get();

                               return view("home.datos.datosEmpleados")
                              ->with(['empleados' => $empleados]);
    }




    function datosProductos(Request $request)
    {
                $id_producto = $request->get('id_producto');

                    $productos = Producto::where('Tienda_id', $id_producto)->get();

                               return view("home.datos.datosProductos")
                                     ->with(['productos' => $productos]);
    }

    
    
    function Formulario(Request $request)
    {
                    $id_producto = $request->get('id_producto');

                        $productos = Producto::where('id', $id_producto)->get();

                                        $productos = $productos[0];

                                            return view("home.datos.Formulario")
                                                       ->with(['producto' => $productos]);
    }



    function CrearVenta(Request $request)
    {
        $fecha = $request->get('fecha');
            $total = $request->get('total');
              $cantidad = $request->get('cantidad');
                $id_tienda = $request->get('id_tienda');
                 $id_producto = $request->get('id_producto');
                    $id_usuario = $request->get('id_usuario');

        
        DB::table("ventas")
            ->insert([
                'Fecha' => $fecha,
                'Total' => $total,
                'Cantidad' => $cantidad,
                'Tienda_Id' => $id_tienda,
                'Producto_id' => $id_producto,
                'Usuarios_Id' => $id_usuario,
            ]);

        Tienda::all();
    }

    function FotoTienda(Request $request)

    {
                     $id_tienda = $request->get('id_tienda');
                     $datos_tienda = Tienda::where('id', $id_tienda)->get();
                     $datos_tienda = $datos_tienda[0];

        return $datos_tienda->Foto;
    }


    function FotoEmpleado(Request $request)
    {
                 $id_empleado = $request->get('id_empleado');
                 $datos_empleado = Usuario::where('id', $id_empleado)->get();

        $datos_empleado = $datos_empleado[0];

        return $datos_empleado->Foto;
    }

    function FotoProducto(Request $request)


    {
        $id_producto = $request->get('id_producto');
        $datos_producto = Producto::where('id', $id_producto)->get();

        $datos_producto = $datos_producto[0];
         return $datos_producto->Foto;
    }
}
