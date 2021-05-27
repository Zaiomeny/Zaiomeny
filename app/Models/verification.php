<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Agents;

class verification extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'projets_id',
        'agents_id',
        'code_analytique',
        'journal_banquaire',
        'activite_nom',
        'total_a_justifier',
        'total_justifie',
        'reste',
        'observation',
        'date_d_arrivee_de_pjs',
        'date_de_verification',
        'verificateur',
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agents::class);
    }
}
