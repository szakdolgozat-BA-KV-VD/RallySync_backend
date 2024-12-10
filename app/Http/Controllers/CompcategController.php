<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompcategController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Compcateg::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $record = new Compcateg();
        $record->fill($request->all());
        $record->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Compcateg::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $record = Compcateg::find($id);
        $record->fill($request->all());
        $record->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Compcateg::find($id)->delete();
    }
}
