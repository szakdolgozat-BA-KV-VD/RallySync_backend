<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    protected $primaryKey = 'azon';

    protected $fillable = [
        'marka_tipus',
         'kategoria',
          'allapot'
        ];

}
