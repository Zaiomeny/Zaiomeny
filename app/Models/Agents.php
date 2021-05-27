<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\verification;

class Agents extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'fonction',
        'num_equipe',
        'adresse',
        'telephone',
        'projets_id',
    ];
    
    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function activites()
    {
        return $this->hasMany(Activites::class);
    }

    public function details()
    {
        return $this->hasMany(Detail::class);
    }
    public function verifications()
    {
        return $this->hasMany(verification::class,'agents_id');
    }
}
