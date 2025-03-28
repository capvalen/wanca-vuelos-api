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
        ->with('cliente', 'destino', 'cuotas', 'viajes', 'participantes', 'proveedores', 'liberados')
        ->limit(50)
        ->orderBy('id', 'desc')
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
        ->with('cliente', 'destino', 'cuotas', 'viajes', 'participantes', 'proveedores', 'liberados')
        ->first();
    }

    public function update(Request $request, string $id)
    {
        $paquete = Paquete::find($id);
        $paquete->update($request->get('paquete'));
        $paquete->save();
        return response()->json($paquete, 200);
    }
    
    public function destroy(string $id)
    {
        //
    }

    public function filtrarPaquete(Request $request)
    {
        $query = Paquete::query();

        if( !$request->filled('paquete') && !$request->filled('razon') && !$request->filled('ruc') ) 
            return response()->json([]);

        if ($request->filled('paquete')) {
            $query->where('paquete', 'like', '%'.$request->paquete.'%');
        }

        if ($request->filled('razon')) {
            $query->whereHas('cliente', function($q) use ($request) {
                $q->where('razon', 'like', '%'.$request->razon.'%');
            });
        }

        if ($request->filled('ruc')) {
            $query->whereHas('cliente', function($qr) use ($request) {
                $qr->where('ruc', 'like', $request->ruc.'%');
            });
        }

        $paquetes = $query->where('activo', 1)
        ->with('cliente', 'destino', 'cuotas', 'viajes', 'participantes', 'proveedores', 'liberados')
        ->get();
        return response()->json($paquetes);
    }
}
