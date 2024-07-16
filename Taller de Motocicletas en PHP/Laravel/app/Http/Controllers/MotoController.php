<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;

class MotoController extends Controller
{
    public function ver($matricula){
        $motocicletas = DB::select("select * from motocicletas where Matricula = '$matricula'");
        return view('datos_motocicleta.ver', ['motocicletas' => $motocicletas]); // Change key to 'motocicletas'
    }
}
?>
