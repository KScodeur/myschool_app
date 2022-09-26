<?php

namespace App\Models;

use App\Models\Eleve;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classe extends Model
{
    use HasFactory;

    protected $fillable=['nom_classe','scolarite'];

    public function eleves(){
        return $this->hasMany(Eleve::class);
    }
}
