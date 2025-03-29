<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
class CajaController extends Controller
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
        $confirmado = Validator::make($request->all(),[
            'user_id' => 'required|integer',
            'apertura' => 'required|numeric',
            'observaciones' => 'nullable|string|max:255'
        ]);

        if($confirmado->fails()){
            $data = [
                'message' => 'Error en la validación de datos',
                'errors' => $confirmado->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $caja = Caja::create([
            'user_id' => $request->user_id,
            'estado' => 'abierta',
            'fecha_apertura' => Carbon::now(),
            'inicial' => $request->apertura,
            'cierre' => 0,
            'observaciones' => $request->observaciones
        ]);

        return response()->json($caja, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $caja = Caja::find($id)->get();
        return $caja;
    }

    public function ultimaCaja()
    {
        $caja = Caja::where('estado', 'abierta')
        ->with('movimientos')->get();

        if($caja->isEmpty())
            $caja = Caja::latest('id')
            ->with('movimientos')->get();
        return $caja[0];
    }
    public function cajaPorFecha($fecha)
    {
        try {
            $fechaCarbon = Carbon::parse($fecha);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Formato de fecha no válido ' 
            ], 500);
        }

        $cajas = Caja::whereDate('fecha_apertura',$fechaCarbon->format('Y-m-d'))->get();
                
        return $cajas;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       if($request->get('estado')=='cerrada'){
        $caja = Caja::find($id);
        $caja->estado= 'cerrada';
        $caja->fecha_cierre = Carbon::now();
        $caja->save();
        return $caja;
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
