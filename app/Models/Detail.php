<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $fillable = [

        'activite_id',
        'agent_id',
        'libele_d_activite',
        'prix',
    ];
}
