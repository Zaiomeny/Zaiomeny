<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'agents_id',
        'activites_id',
        'libele_d_activite',
        'prix',
    ];

    public function activite()
    {
        return $this->belongsTo(Activite::class);
    }
    
    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
