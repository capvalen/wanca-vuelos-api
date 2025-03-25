<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\PaqueteParticipante;
use App\Models\Participante;

class PaqueteParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return PaqueteParticipante::get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $confirmado = Validator::make($request->all(), [
            'paquete_id' => 'required|numeric|min:1',
            'participante_id' => 'required|numeric|min:1',
        ]);

        if($confirmado->fails()){
			$data = [
				'message' => 'Error en la validación de datos',
				'errors' => $confirmado->errors(),
				'status' => 400
			];
			return response()->json($data, 400);
		}

        PaqueteParticipante::create($confirmado->validated());

        $participantes = Participante::find($request->participante_id);
	
		// entregamos la $tarea que acabamos de ingresar
		return response()->json($participantes, 201);
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
        $task = PaqueteParticipante::find($id);
		$task->activo = 0;
		$task->save();

        return response()->json(null, 204);
    }
}
