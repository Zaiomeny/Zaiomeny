<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class verification extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'projet_id',
        'agent_id',
        'activite_nom',
        'total_a_justifier',
        'total_justifie',
        'reste',
        'observation',
        'date_d_arrivee_de_pjs',
        'date_de_verification',
        'verificateur',
    ];
}
