<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brs extends Model
{
    use HasFactory;
    protected $fillable = [
        'activite_id',
        'agent_id',
        'fonction',
        'montant',
        'num_equipe',
        'date_de_virement',
        'etat',
        'verificateur',
        'verifie_le',
    ];
}
