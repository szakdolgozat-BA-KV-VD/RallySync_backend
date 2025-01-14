<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class V_allapot extends Model
{
    protected $primaryKey ='state_id';

    protected $fillable = [
        'state'
    ];
}
