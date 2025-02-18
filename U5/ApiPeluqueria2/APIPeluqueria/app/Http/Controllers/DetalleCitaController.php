<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\DetalleCita;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DetalleCitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
    public function show(Request $request)
    {
        return DetalleCita::where('cita_id',$request->id_cita)->get();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetalleCita $detalleCita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetalleCita $detalleCita)
    {
        //
    }
}
