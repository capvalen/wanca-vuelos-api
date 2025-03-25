<?php

namespace App\Http\Controllers;

use App\Models\Viaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ViajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $confirmado = Validator::make($request->all(), [
			'paquete_id' => 'required|numeric|min:1',
			'fecha_salida' => 'nullable|date',
			'ciudad_salida' => 'string|max:255',
			'fecha_llegada' => 'nullable|date',
			'ciudad_llegada' => 'string|max:255',
		]);
	
		if($confirmado->fails()){
			$data = [
				'message' => 'Error en la validación de datos',
				'errors' => $confirmado->errors(),
				'status' => 400
			];
			return response()->json($data, 400);
		}
	
		//Una vez validado, se crea, pero se toma datos por defecto de lo ya validado
		$tarea = Viaje::create($confirmado->validated());
	
		// entregamos la $tarea que acabamos de ingresar
		return response()->json($tarea, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $viaje = Viaje::find($id);
		$viaje->activo = 0;
		$viaje->save();

        return response()->json(null, 204);
    }
}
