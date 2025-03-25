<?php

namespace App\Http\Controllers;

use App\Models\Cuota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CuotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return Cuota::where('activo', 1)->orderBy('id', 'asc')
        //->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $confirmado = Validator::make($request->all(), [
			'paquete_id' => 'required|numeric|min:1',
			'monto' => 'required|numeric|min:0',
			'desde' => 'nullable|date',
			'hasta' => 'nullable|date'
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
		$tarea = Cuota::create($confirmado->validated());
	
		// entregamos la $tarea que acabamos de ingresar
		return response()->json($tarea, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $idPaquete)
    {
        return Cuota::where('paquete_id', $idPaquete)->orderBy('id', 'asc')
        ->get();
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
        $cuota = Cuota::find($id);
		$cuota->activo = 0;
		$cuota->save();

        return response()->json(null, 204);
    }
}
