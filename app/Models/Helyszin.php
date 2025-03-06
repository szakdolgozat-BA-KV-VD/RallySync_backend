<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Helyszin extends Model
{
    protected $primaryKey = 'helyszin';

    protected $fillable = ['elnevezes'];
    
}
