<?php

namespace App\Http\Controllers;

use App\Models\Recurso;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return Recurso::all();
        } catch (\Throwable $th) {
            return response()->json(['error : '.$th->getMessage()], 500);
        }
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
    public function show(Recurso $recurso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recurso $recurso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recurso $recurso)
    {
        //
    }
}
