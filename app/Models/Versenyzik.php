<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versenyzik extends Model
{
    protected $primaryKey = 'verseny';

    protected $fillable = [
        'versenyzo',
        'auto',
        'erkezik',
        'rajt_ido',
        'cel_ido'
    ];
}
