<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		//$clientes = Client::all()
		$clientes = Client::orderBy('id', 'desc')
		->with('paquetes')
		->get();
		return response()->json($clientes);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		$confirmado = Validator::make($request->all(), [
			'ruc' => 'required|string|max:15',
			'razon' => 'required|string|max:250',
			'observaciones' => 'nullable|string'
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
		$tarea = Client::create($confirmado->validated());
	
		//Engrega un código de respuesta 201 = elemento creado
		// entregamos la $tarea que acabamos de ingresar
		return response()->json($tarea, 201);
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		$cliente = Client::with('paquetes')->find($id);
		return response()->json($cliente);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		$task = Client::find($id);
		$confirmado = $request->validate([
			'ruc' => 'required|string|max:15',
			'razon' => 'required|string|max:250',
			'observaciones' => 'nullable|string'
		]);

		$task->update($confirmado);

		return response()->json($task);
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		$task = Client::find($id);
		$task->activo = 0;
		$task->save();
	}

	public function buscarCliente(Request $request){
		$request->validate([
			'dni' => 'nullable|string|max:20',
			'nombres' => 'nullable|string|max:100',
		]);

		if (empty($request->dni) && empty($request->nombres)) {
			return response()->json( [0 => ['razon' => 'Debe ingresar al menos DNI o Nombres para buscar']] );
		}

		$query = Client::query();

    if ($request->filled('dni')) {
        $query->where('ruc', 'like', '%' . $request->dni . '%');
    }

    if ($request->filled('nombres')) {
        $query->where('razon', 'like', '%' . $request->nombres . '%');
    }

		$clientes = $query->get();
		return response()->json($clientes);
	}
}
