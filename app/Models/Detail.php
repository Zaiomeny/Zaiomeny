<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'agent_id',
        'activite_id',
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
