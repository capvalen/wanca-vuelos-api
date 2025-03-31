<?php

namespace App\Http\Controllers;

use App\Models\ClientDocumento;
use Illuminate\Http\Request;

class ClientDocumentosController extends Controller
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
        $cliente_doc = ClientDocumento::create($request->all());
        return response()->json($cliente_doc);
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
        $cliente_doc = ClientDocumento::find($id);
        $cliente_doc->update($request->all());
        return response()->json($cliente_doc);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
