<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activites extends Model
{
    use HasFactory;
    protected $fillable=[
        
        'nom',
        'projet_id',
        'agent_id',
        'montant',
        'date_de_virement',
        
        
    ];
    public function details()
    {
        return $this->hasMany(Detail::class);
    }
    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
    public function agent()
    {
        return $this->belongsTo(Agents::class);
    }
}
