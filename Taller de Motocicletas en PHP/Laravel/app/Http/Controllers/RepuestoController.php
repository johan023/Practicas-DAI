<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;

class RepuestoController extends Controller
{
    public function ver(){
        $repuestos = DB::select('select * from repuestos');
        return view('repuestos.ver', ['repuestos' => $repuestos]);
    }

    public function actualizar($referencia, $ganancia){
        // Validar que la referencia y ganancia son números
        if(is_numeric($referencia) && is_numeric($ganancia)) {
            // Comprobar si la referencia existe
            $repuesto = DB::select('select * from repuestos where Referencia = ?', [$referencia]);

            if ($repuesto) {
                // Usar DB::update para actualizar la ganancia del repuesto con la referencia dada
                DB::update('UPDATE repuestos SET Ganancia = ? WHERE Referencia = ?', [$ganancia, $referencia]);
                return redirect('repuestos')->with('status', 'Ganancia actualizada correctamente.');
            } else {
                // Si la referencia no existe, mostrar un mensaje de error
                return redirect('repuestos')->with('status', 'Referencia no encontrada.');
            }
        } else {
            return redirect('repuestos')->with('status', 'Datos inválidos.');
        }
    }
}

?>

