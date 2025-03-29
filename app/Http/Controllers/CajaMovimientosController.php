<?php

namespace App\Http\Controllers;

use App\Models\Aportacion;
use App\Models\CajaMovimientos;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CajaMovimientosController extends Controller
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
        $movimiento = CajaMovimientos::create($request->all());

        if($request->proceso_id!=1 && $request->proceso_id!=2){
            $data = $request->all();
            $data['fecha'] = Carbon::now();
            $data['caja_movimientos_id'] = $movimiento->id;

            $aportacion = Aportacion::create($data);

            return response()->json($aportacion); 
        }
        
        return response()->json(CajaMovimientos::find($movimiento->id));
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
        $movimiento = CajaMovimientos::find($id);
        $movimiento->update($request->all());
        return response()->json($movimiento);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
