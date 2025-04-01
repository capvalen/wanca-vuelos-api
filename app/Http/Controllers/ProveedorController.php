<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Proveedor::where('activo', 1)
        ->limit(50)
        ->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $confirmado = Validator::make($request->all(), [
			'nombre' => 'required|string|max:255',
			'destino_id' => 'required|numeric|min:1',
			'servicio_id' => 'required|numeric|min:1',
			'concepto_id' => 'required|numeric|min:1',
			'inicio' => 'nullable|date',
			'final' => 'nullable|date',
			'contacto' => 'nullable|string|max:255',
			'observaciones' => 'nullable|string',			
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
		$tarea = Proveedor::create($confirmado->validated());
	
		// entregamos la $tarea que acabamos de ingresar
		return response()->json($tarea, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Proveedor::where('id', $id)
        ->where('activo', 1)
        ->first();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $proveedor = Proveedor::find($id);

        $confirmado = Validator::make($request->all(), [
			'nombre' => 'required|string|max:255',
			'destino_id' => 'required|numeric|min:1',
			'servicio_id' => 'required|numeric|min:1',
			'concepto_id' => 'required|numeric|min:1',
			'inicio' => 'nullable|date',
			'final' => 'nullable|date',
			'contacto' => 'nullable|string|max:255',
			'observaciones' => 'nullable|string',
            'detalles' => 'nullable|array'
		]);
	
		$proveedor->update($confirmado->validate());
	
		return response()->json($proveedor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proveedor = Proveedor::find($id);
		$proveedor->activo = 0;
		$proveedor->save();

        return response()->json(null, 204);
    }

    public function buscarProveedor(Request $request){
        if($request->input('texto')=='' || $request->input('texto') == null ){
            return response()->json(null, 400);
        }
        $texto = $request->input('texto');
        $participante = Proveedor::where('nombre', 'like', "%{$texto}%")
        ->orWhere('contacto', 'like', "%{$texto}%")
        ->get();
        return response()->json($participante);
    }
}
