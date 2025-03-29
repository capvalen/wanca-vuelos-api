<?php

namespace App\Http\Controllers;

use App\Models\Aportacion;
use Illuminate\Http\Request;

class AportacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Aportacion::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $aportacion = Aportacion::find($id);
        $aportacion->activo = 0;
        $aportacion->save();
        return response()->json([
            'message' => 'Aportación eliminada correctamente',
            'aportacion' => $aportacion
        ]);
    }
}
