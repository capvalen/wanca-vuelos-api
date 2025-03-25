<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Paquete;
use Illuminate\Http\Request;

class PaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Paquete::where('activo', 1)->orderBy('id', 'desc')
        ->with('cliente', 'destino', 'cuotas', 'viajes', 'participantes', 'proveedores') 
        ->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $confirmado = Validator::make($request->all(), [
			'client_id' => 'required|numeric|min:1',
			'paquete' => 'required|string|max:255',
			'salida' => 'nullable|date',
			'regreso' => 'nullable|date',
			'paquete' => 'required|string|max:255',
			'costo' => 'required|numeric|min:0',
			'adicional' => 'required|numeric|min:0',
			'precio' => 'required|numeric|min:0',
			'motivo' => 'nullable|string|max:255',
			'observaciones' => 'nullable|string',
			'moneda_id' => 'required|numeric',
			'destino_id' => 'required|numeric'
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
		$tarea = Paquete::create($confirmado->validated());
	
		// entregamos la $tarea que acabamos de ingresar
		return response()->json($tarea, 201);
    }

    public function show(string $id)
    {
        return Paquete::where('id', $id)
        ->where('activo', 1)
        ->with('cliente', 'destino', 'cuotas', 'viajes', 'participantes', 'proveedores')
        ->first();
    }

    public function update(Request $request, string $id)
    {
        //
    }

    
    public function destroy(string $id)
    {
        //
    }
}
