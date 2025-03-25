<?php

namespace App\Http\Controllers;

use App\Models\Liberado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LiberadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $liberados = Liberado::where('activo', 1)->orderBy('id', 'desc')->limit(50)->get();
        return response()->json($liberados);
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
			'caducidad' => 'nullable|date',
			'relacion_id' => 'required|numeric|min:1',
			'direccion' => 'nullable|string|max:5000',
			'celular' => 'nullable|string|max:50',
			'ficha' => 'nullable|boolean',
			'acuerdo' => 'nullable|boolean',
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

		//Una vez validado, se crea, pero se toma datos por defecto de lo ya validado
		$tarea = Liberado::create($datosValidados);
	
		// entregamos la $tarea que acabamos de ingresar
		return response()->json($tarea, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $liberado = Liberado::where('id', $id)->first();
        return response()->json($liberado);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Liberado::find($id);

		$confirmado = Validator::make($request->all(),[
			'dni' => 'required|string|max:15',
            'apellidos' => 'required|string|max:250',
            'nombres' => 'required|string|max:250',
			'caducidad' => 'nullable|date',
			'relacion_id' => 'required|numeric|min:1',
			'direccion' => 'nullable|string|max:5000',
			'celular' => 'nullable|string|max:50',
			'ficha' => 'nullable|boolean',
			'acuerdo' => 'nullable|boolean',
            'pasaporte' => 'nullable|string',
			'observaciones' => 'nullable|string|max:5000',
            'fecha_ficha' => 'nullable|date',
            'fecha_acuerdo' => 'nullable|date',
		]);

        $datosValidados = $confirmado->validated();

        //la validación la hacemos desde el cliente

		$task->update($datosValidados);

		return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $participante = Liberado::find($id);
		$participante->activo = 0;
		$participante->save();

        return response()->json(null, 204);
    }

    public function buscarLiberado(Request $request){
		$request->validate([
			'dni' => 'nullable|string|max:20',
			'nombres' => 'nullable|string|max:100',
		]);

		if (empty($request->dni) && empty($request->nombres)) {
			return response()->json( [0 => ['nombres' => 'Debe ingresar al menos DNI o Nombres para buscar']] );
		}

		$query = Liberado::query();

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
}
