<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
         $columns = [
            'checkbox',
            'Nombre',
            'Apellido',
            'ID',
            'Área',
            'Cargo',
            'Rol',
            'Jefe',
        ];
        $rows = [
            ['id'=>1,'checkbox'=>false,'Nombre'=>'Jhon','Apellido'=>'Pérez','ID'=>'10184478545','Área'=>'Marketing y estrategias','Cargo'=>'Director Creativo','Rol'=>'Jefe','Jefe'=>'Elisa Gómez','actions'=>true],
            ['id'=>2,'checkbox'=>false,'Nombre'=>'María','Apellido'=> 'López','ID'=>'10184478546','Área'=>'Finanzas','Cargo'=>'Analista Financiero','Rol'=>'Colaborador','Jefe'=>'Jhon Pérez','actions'=>true],
        ];

        return view('roles.index', compact('columns','rows'));
    }
}
