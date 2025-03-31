<?php

namespace App\Http\Controllers;

use App\Models\ParticipanteDocumentos;
use Illuminate\Http\Request;

class ParticipanteDocumentosController extends Controller
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
        $participante_doc = ParticipanteDocumentos::create($request->all());
        return response()->json($participante_doc);
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
        $participante_doc = ParticipanteDocumentos::find($id);
        $participante_doc->update($request->all());
        return response()->json($participante_doc);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
