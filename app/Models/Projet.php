<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
    protected $fillable = [
        'num_br',
        'nom',
        'date',
    ];

    public function activites()
    {
        return $this->hasMany(Activites::class);
    }
    public function agents()
    {
        return $this->hasMany(Agents::class);
    }
}
