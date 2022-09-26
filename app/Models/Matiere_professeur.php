<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere_professeur extends Model
{
    use HasFactory;
    protected $table='matiere_professeur';
    protected $fillable=["matiere_id","professeur_id"];


    public function professeurs()
    {
        return $this->belongsToMany (Professeur::class);
    }
    public function matieres()
    {
        return $this->belongsToMany(Matiere::class);
    }
}
