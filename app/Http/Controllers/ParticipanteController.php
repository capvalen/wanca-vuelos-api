<?php

namespace App\Http\Controllers;

use App\Models\Participante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $participante = Participante::where('activo', 1)->orderBy('id', 'desc')->limit(50)->get();
        return response()->json($participante);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $confirmado = Validator::make($request->all(), [
			'dni' => 'required|string|max:15',
            'apellidos' => 'required|string|max:250',
            'nombres' => 'required|string|max:250',
			'direccion' => 'nullable|string|max:5000',
			'caducidad' => 'nullable|date',
			'celular' => 'nullable|string|max:50',
			'ficha' => 'nullable|boolean',
			'acuerdo' => 'nullable|boolean',
			'copia_papa' => 'nullable|boolean',
			'copia_mama' => 'nullable|boolean',
            'pasaporte' => 'nullable|string',
			'observaciones' => 'nullable|string|max:5000',
		]);

        
        if($confirmado->fails()){
			$data = [
				'message' => 'Error en la validación de datos',
				'errors' => $confirmado->errors(),
				'status' => 400
			];
			return response()->json($data, 400);
		}

        $datosValidados = $confirmado->validated();

        if ($request->boolean('ficha')) $datosValidados['fecha_ficha'] = now()->toDateString();
        if ($request->boolean('acuerdo')) $datosValidados['fecha_acuerdo'] = now()->toDateString();
        if ($request->boolean('copia_papa')) $datosValidados['fecha_copia_papa'] = now()->toDateString();
        if ($request->boolean('copia_mama')) $datosValidados['fecha_copia_mama'] = now()->toDateString();
	
		//Una vez validado, se crea, pero se toma datos por defecto de lo ya validado
		$tarea = Participante::create($datosValidados);
	
		// entregamos la $tarea que acabamos de ingresar
		return response()->json($tarea, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $participante = Participante::where('id', $id)->first();
        return response()->json($participante);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Participante::find($id);

		$confirmado = Validator::make($request->all(),[
			'dni' => 'required|string|max:15',
            'apellidos' => 'required|string|max:250',
            'nombres' => 'required|string|max:250',
			'direccion' => 'nullable|string|max:5000',
			'caducidad' => 'nullable|date',
			'celular' => 'nullable|string|max:50',
			'ficha' => 'nullable|boolean',
			'acuerdo' => 'nullable|boolean',
			'copia_papa' => 'nullable|boolean',
			'copia_mama' => 'nullable|boolean',
            'fecha_ficha' => 'nullable|date',
            'fecha_acuerdo' => 'nullable|date',
            'fecha_copia_papa' => 'nullable|date',
            'fecha_copia_mama' => 'nullable|date',
            'pasaporte' => 'nullable|string',
			'observaciones' => 'nullable|string|max:5000',
		]);

        $datosValidados = $confirmado->validated();

        //la validación la hacemos desde el cliente

		$task->update($datosValidados);

		return response()->json($task);
    }
    
    public function buscarParticipante(Request $request){
        if($request->input('texto')=='' || $request->input('texto') == null ){
            return response()->json(null, 400);
        }
        $texto = $request->input('texto');
        $participante = Participante::where('apellidos', 'like', "%{$texto}%")
        ->orWhere('nombres', 'like', "%{$texto}%")
        ->orWhere('dni', $texto)
        ->orWhere('celular', $texto)
        ->orderBy('apellidos', 'asc')
        ->orderBy('nombres', 'asc')
        ->get();
        return response()->json($participante);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $participante = Participante::find($id);
		$participante->activo = 0;
		$participante->save();

        return response()->json(null, 204);
    }
}
