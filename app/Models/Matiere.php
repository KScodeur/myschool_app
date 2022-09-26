<?php

namespace App\Models;

use App\Models\Professeur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matiere extends Model
{
    use HasFactory;
    protected $fillable=["nom_matiere","abreviation"];
    public function professeurs()
    {
        return $this->belongsToMany (Professeur::class);
    }
}
