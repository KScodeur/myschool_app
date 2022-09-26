<?php

namespace App\Models;

use App\Models\Classe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Eleve extends Model
{
    use HasFactory;
    protected $fillable =["nom","prenom","classe_id","nationalite","date_naissance","lieu_naissance","nom_pere",
                            "sexe","nom_pere","pere_profession","tel","nom_mere","mere_profession","email"];
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
