<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Eleve;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClasseController extends Controller
{
    public function index()
    {
        if(Session::has('loginId')){
            $data=Utilisateur::where('id',Session::get('loginId'))->first();
            }else{
                return redirect('/');
            }
        $classes=Classe::get();
        return view('scolarite',compact('classes','data'));
    }
    public function getByClass(){
        if(Session::has('loginId')){
            $data=Utilisateur::where('id',Session::get('loginId'))->first();
            }else{
                return redirect('/');
            }
        $eleves=Eleve::get();
        $sixiemes=Eleve::where('classe_id',1)->get();
        $classes=Classe::get();
        return view('listeParClasse',compact('classes','data','sixiemes'));
    }
    public function store(Request $request)
    {
        // $routes = $this->get($request->getMethod());
        $request->validate([
            "nom_classe"=>"required",
            "scolarite"=>"required" 
        ]);                                                         
        // lorsque qu'on a declarer les fillable dans le model c'est le cas chez moi
        Classe::create($request->all()); 

    // reviens sur la meme page ou il y a le formulaire et affiche le message
        return back()->with("success","Classe ajouter avec succès");
    }

//     public function edit($id){
//         $classes=Classe::get();
//         $eleves=Eleve::find($id);
//         return view('update',compact('classes','eleves'));
// }

// public function update(Request $request, $id)
// {
//     $eleves = Eleve::find($id);
//     $input = $request->all();
//     $eleves->update($input);
//     return redirect('create/list')->with('success', 'mise a jour accompli');  
// }
public function deleteClasse($id)
{
    $data=Classe::find($id);
    $data->delete();
    return back()->with("success","Classe supprimer avec succès");
}

public function edit($id)
{
    if(Session::has('loginId')){
        $data=Utilisateur::where('id',Session::get('loginId'))->first();
        }else{
            return redirect('/');
        }
        $eleves=Eleve::get();
        $classes=Classe::find($id);
        return view('editClasse',compact('classes','eleves','data'));
}

public function update(Request $request, $id)
{
    // if(Session::has('loginId')){
    //     $data=Utilisateur::where('id',Session::get('loginId'))->first();
    //     }else{
    //         return redirect('/');
    //     }
    
    $classes = Classe::find($id);
    $input = $request->all();
    $classes->update($input);
    return redirect('classes/scolarite')->with('success', 'mise a jour accompli');  
}
}


