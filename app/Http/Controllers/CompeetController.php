<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Compeet;
use App\Models\User;
use Illuminate\Http\Request;

class CompeetController extends Controller
{
    public function index()
    {
        return Compeet::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($this->freeCar($request->car) && $this->isCompetitor($request->user)){
            $record = new Compeet();
            $record->fill($request->all());
            $record->save();
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Compeet::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $record = Compeet::find($id);
        $record->fill($request->all());
        $record->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Compeet::find($id)->delete();
    }

    //szabad-e az autó
    public function freeCar(string $id){
        
        $car = Car::find($id);
        return $car->status == 1;
    }

    //versenyző-e a felhasználó
    public function isCompetitor(string $id){
        
        $user = User::find($id);
        return $user->permission == 1;
    }
}
