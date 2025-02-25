<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompeetController extends Controller
{
    public function legtobbetHasznaltMarka()
    {
        return DB::select('
        SELECT cp.competitor, bt.brandtype, COUNT(*) AS used_count
        FROM compeets cp
        JOIN cars ca ON cp.car = ca.cid
        JOIN brandtypes bt ON ca.brandtype = bt.bt_id
        GROUP BY cp.competitor, bt.brandtype
        HAVING COUNT(*) = (
            SELECT MAX(sub.used_count) 
            FROM (
                SELECT COUNT(*) AS used_count
                FROM compeets
                JOIN cars ON compeets.car = cars.cid
                JOIN brandtypes ON cars.brandtype = brandtypes.bt_id
                GROUP BY compeets.competitor, brandtypes.brandtype
            ) AS sub
        );
    ');
    
    
    }

    public function legtobbetHasznaltKategoria(){
        return DB::select('
    SELECT cp.competitor, c.category, COUNT(*) AS used_count
    FROM compeets cp
    JOIN cars ca ON cp.car = ca.cid
    JOIN categories c ON ca.category = c.categ_id
    GROUP BY cp.competitor, c.category
    HAVING COUNT(*) = (
        SELECT MAX(sub.used_count) 
        FROM (
            SELECT COUNT(*) AS used_count
            FROM compeets
            JOIN cars ON compeets.car = cars.cid
            JOIN categories ON cars.category = categories.categ_id
            GROUP BY compeets.competitor, categories.category
        ) AS sub
    );
');


    }

    public function legtobbetVersenyzettTerulet(){
        return DB::select('
    SELECT cp.competitor, p.place, COUNT(*) AS total
    FROM compeets cp
    JOIN competitions co ON cp.competition = co.comp_id
    JOIN places p ON co.place = p.plac_id
    GROUP BY cp.competitor, p.place
    HAVING COUNT(*) = (
        SELECT MAX(sub.total) 
        FROM (
            SELECT COUNT(*) AS total
            FROM compeets
            JOIN competitions ON compeets.competition = competitions.comp_id
            JOIN places ON competitions.place = places.plac_id
            GROUP BY compeets.competitor, places.place
        ) AS sub
    );
');


    }

    public function leggyorsabbPajaido(){
        return DB::select('
        SELECT co.event_name, c.category, cp.car, 
            MIN(TIMESTAMPDIFF(SECOND, cp.start_date, cp.finish_date)) AS fastest_time
        FROM compeets cp
        JOIN competitions co ON cp.competition = co.comp_id
        JOIN cars ca ON cp.car = ca.cid
        JOIN categories c ON ca.category = c.categ_id
        WHERE cp.start_date IS NOT NULL AND cp.finish_date IS NOT NULL
        GROUP BY co.event_name, c.category, cp.car;
');

    }
}
