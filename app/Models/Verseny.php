<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verseny extends Model
{
    protected $primaryKey = 'verseny_id';

    protected $fillable = [
        'helyszin',
        'szervezo',
        'leiras',
        'mettol',
        'meddig'
    ];
}
