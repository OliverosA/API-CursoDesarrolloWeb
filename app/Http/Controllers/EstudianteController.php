<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEstudianteRequest;
use App\Http\Requests\UpdateEstudianteRequest;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{

    //metodo GET listar registros
    public function index(Request $request)
    {
        if($request->has('txtBuscar')){
            $estudiantes = Estudiante::where('nombre', 'like', '%' . $request->txtBuscar . '%')
                ->get();
        }
        else{
            $estudiantes = Estudiante::all();
        }
        return $estudiantes;

    }


    //POST insertar datos manejado por medio de CreateEstudianteRequest
    //para validar reglas de insercion (ir a la carpeta Http/Requests)
    public function store(CreateEstudianteRequest $request)
    {
        $input = $request->all();
        Estudiante::create($input);
        return response()->json([
            'res' => true,
            'message' => 'Estudiante Creado Correctamente'
        ],  200);
    }


    //listado GET de un solo registro por ID
    public function show(Estudiante $estudiante)
    {
        return $estudiante;
    }

    //PUT actualizar registros
    public function update(UpdateEstudianteRequest $request, Estudiante $estudiante)
    {
        $input = $request->all();
        $estudiante->update($input);
        return response()->json([
            'res' => true,
            'message' => 'Estudiante Actualizado Correctamente'
        ],  200);
    }

    //DELETE eliminar registros
    public function destroy($id)
    {
        Estudiante::destroy($id);
        return response()->json([
            'res' => true,
            'message' => 'Estudiante Eliminado Correctamente'
        ],  200);
    }
}
