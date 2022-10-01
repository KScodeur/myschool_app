<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Models\Matiere_professeur;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MatiereController extends Controller
{
    public function read()
    {   if(Session::has('loginId')){
        $data=Utilisateur::where('id',Session::get('loginId'))->first();
        }else{
            return redirect('/');
        }
        $matieres=Matiere::get();
        // $matieres=Matiere::with('professeurs')->get();

        return view('matieres',compact('matieres','data'));
    }
    public function store(Request $request)
    {
        // $routes = $this->get($request->getMethod());
        $request->validate([
            "nom_matiere"=>"required",
            
        ]);                                                         
        // lorsque qu'on a declarer les fillable dans le model c'est le cas chez moi
        Matiere::create($request->all()); 

    // reviens sur la meme page ou il y a le formulaire et affiche le message
        return back()->with("success","Matiere ajouter avec succès");
    }

    public function delete($id)
    {
    $data=Matiere::find($id);
    if ($data != null) {
        $data->delete();
    return back()->with("success","Matiere supprimer avec succès");
    }
    return back()->with("success","Matiere supprimer avec succès");

    }

    public function edit($id)
{
    if(Session::has('loginId')){
        $data=Utilisateur::where('id',Session::get('loginId'))->first();
        }else{
            return redirect('/');
        }
        $matieres=Matiere::find($id);
        return view('/editMatiere',compact('matieres','data'));
    }

    public function update(Request $request, $id)
    {
      
        
        $matieres =Matiere::find($id);
        $input = $request->all();
        $matieres->update($input);
        return redirect('/matieres')->with('success', 'mise a jour accompli');  
    }

}
