<?php

namespace App\Models;

use App\Models\Matiere;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Professeur extends Model
{
    use HasFactory;
    protected $fillable=["nom","prenom","sexe","date_naissance","grade","specialite"];
    public function matieres()
    {
        return $this->belongsToMany(Matiere::class);
    }
}
