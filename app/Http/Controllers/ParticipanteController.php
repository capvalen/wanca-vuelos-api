<?php

namespace App\Http\Controllers;

use App\Models\ClientDocumento;
use App\Models\Documento;
use App\Models\Participante;
use App\Models\ParticipanteDocumentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $participante = Participante::where('activo', 1)->orderBy('id', 'desc')
        ->with('documentos')->limit(50)->get();
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
		$participante = Participante::create($datosValidados);
        
        $documetos = Documento::where('pertenencia', 'participante')->get();
		$data = [];

		foreach ($documetos as $documento) {
			$data['participante_id'] = $participante->id;
			$data['documento_id'] = $documento->id;
			ParticipanteDocumentos::create($data);
		}
	
		// entregamos la $tarea que acabamos de ingresar
		return response()->json($participante, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $participante = Participante::where('id', $id)
        ->with('documentos')->first();
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
    
    public function filtrarParticipante(Request $request){
		$request->validate([
			'dni' => 'nullable|string|max:20',
			'nombres' => 'nullable|string|max:100',
		]);

		if (empty($request->dni) && empty($request->nombres)) {
			return response()->json( [0 => ['nombres' => 'Debe ingresar al menos DNI o Nombres para buscar']] );
		}

		$query = Participante::query();

        if ($request->filled('dni')) {
            $query->where('dni', 'like', '%' . $request->dni . '%');
        }

        if ($request->filled('nombres')) {
            $query->where('apellidos', 'like', '%' . $request->nombres . '%')
            ->orWhere('nombres', 'like', '%' . $request->nombres . '%');
        }

        $clientes = $query->get();
        return response()->json($clientes);
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
