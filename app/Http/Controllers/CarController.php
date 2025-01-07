<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Car::all();
    }

    public function osszesAutoMarkajaCategoriakkalAllapottal()
    {
        return DB::select('
            SELECT bt.brandtype, ca.category, ss.statsus 
            FROM cars cs
            INNER JOIN brandtypes bt ON cs.brandtype = bt.bt_id
            INNER JOIN categories ca ON cs.category = ca.categ_id
            INNER JOIN statuses ss ON cs.status = ss.stat_id
        ');
    }

    public function osszesSzabadAuto()
    {
        return DB::select('
            SELECT bt.brandtype, ca.category, ss.statsus 
            FROM cars cs
            INNER JOIN brandtypes bt ON cs.brandtype = bt.bt_id
            INNER JOIN categories ca ON cs.category = ca.categ_id
            INNER JOIN statuses ss ON cs.status = ss.stat_id
            WHERE ss.statsus = ?
        ', ['Szabad']);
    }

    public function osszesFoglaltAuto()
    {
        return DB::select('
            SELECT bt.brandtype, ca.category, ss.statsus 
            FROM cars cs
            INNER JOIN brandtypes bt ON cs.brandtype = bt.bt_id
            INNER JOIN categories ca ON cs.category = ca.categ_id
            INNER JOIN statuses ss ON cs.status = ss.stat_id
            WHERE ss.statsus = ?
        ', ['Foglalt']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $record = new Car();
        $record->fill($request->all());
        $record->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Car::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $record = Car::find($id);
        $record->fill($request->all());
        $record->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::find($id)->delete();
    }
}
