<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benevez extends Model
{
    protected $primaryKey = ['versenyzo', 'verseny'];

    protected $fillable = ['kategoria'];
    
}
