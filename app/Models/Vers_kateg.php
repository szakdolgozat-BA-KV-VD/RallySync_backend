<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vers_kateg extends Model
{
    protected $primaryKey = 'verseny';

    protected $fillable = ['kategoria'];
}
