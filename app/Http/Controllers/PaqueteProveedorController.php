<?php

namespace App\Http\Controllers;

use App\Models\PaqueteProveedor;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaqueteProveedorController extends Controller
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
            'proveedor_id' => 'required|numeric|min:1',
        ]);

        if($confirmado->fails()){
			$data = [
				'message' => 'Error en la validación de datos',
				'errors' => $confirmado->errors(),
				'status' => 400
			];
			return response()->json($data, 400);
		}

        PaqueteProveedor::create($confirmado->validated());

        $proveedores = Proveedor::find($request->proveedor_id);
	
		// entregamos la $tarea que acabamos de ingresar
		return response()->json($proveedores, 201);
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
        $task = PaqueteProveedor::find($id);
		$task->activo = 0;
		$task->save();

        return response()->json(null, 204);
    }


}
