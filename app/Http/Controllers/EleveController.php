<?php 

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Utilisateur;
// connection avec la base de donnée
use App\Models\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EleveController extends Controller{
    public function create()
    {
        if(Session::has('loginId')){
            $data=Utilisateur::where('id',Session::get('loginId'))->first();
            }else{
                return redirect('/');
            }
        $classes=Classe::all();
        // $eleve = new Eleve;
        // $eleve->nom = $request->nom;
        // $eleve->prenom = $request->prenom;
        // $eleve->nationalité = $request->nationalité;
            // return $request->input();
            return view('createEleve',compact('classes','data'));
    }

    // cette fonction ci dessous permet d'enregistrer l'élève après l'insertion dans le formulaire.
    public function store(Request $request)
    {
        // $routes = $this->get($request->getMethod());
        $request->validate([
            "classe_id",
            "nom"=>"required",
            "prenom"=>"required",
            "date_naissance",
            "lieu_naissance",
            "nom_pere", 
            "nationalite",
            "sexe", 
            "nom_pere", 
            "pere_profession", 
            "tel",
            "nom_mere",
            "mere_profession",
            "email" 
        ]);                                                         
        // lorsque qu'on a declarer les fillable dans le model c'est le cas chez moi
        Eleve::create($request->all()); 
        // où dans le cas contraire,
        //    Eleve::create([
        //        "nom"=>$request->nom,
        //        "prenom"=>$request->nom,
        //        "classe_id"=>$request->nom,
        //    ]);
        // return dd($_POST);

    // reviens sur la meme page ou il y a le formulaire et affiche le message
        return back()->with("success","élève ajouter avec succès");
    }


    public function getAll(Request $request)
    {
        if(Session::has('loginId')){
            $data=Utilisateur::where('id',Session::get('loginId'))->first();
            }else{
                return redirect('/');
            }
        $search=$request['search'] ?? "";
        if ($search !="") {
            // where
            $eleves=Eleve::where('nom','LIKE','%'.$search.'%')
                            ->orWhere('prenom','LIKE','%'.$search.'%')
                            ->orWhere('sexe','LIKE','%'.$search.'%')
                            ->get(); 
            $classes=Classe::get();
            
        }else{
            $eleves=Eleve::orderBy("nom","asc")->paginate(10); 
            $classes=Classe::get();
        }
        return view('getAllEleves',compact('eleves','classes','data','search'));

        
    //     if(isset($_GET['search'])){
    //         $search=$_GET['search'];
    //         $someone=Eleve::where('nom','LIKE','%'.$search.'%')->get();
       
       
    //     return view('getAllEleves',compact('eleves','classes','someone','data'));
    // }else{
    //     return view('getAllEleves',compact('eleves','classes','data'));
    // }
    }
    
    public function edit($id)
    {
        if(Session::has('loginId')){
            $data=Utilisateur::where('id',Session::get('loginId'))->first();
            }else{
                return redirect('/');
            }
            $classes=Classe::get();
            $eleves=Eleve::find($id);
            return view('update',compact('classes','eleves','data'));
    }

    public function update(Request $request, $id)
    {
        // if(Session::has('loginId')){
        //     $data=Utilisateur::where('id',Session::get('loginId'))->first();
        //     }else{
        //         return redirect('/');
        //     }
        
        $eleves = Eleve::find($id);
        $input = $request->all();
        $eleves->update($input);
        return back()->with('success', 'mise a jour accompli');  
    }
    public function delete($id)
    {
        $data=Eleve::find($id);
        if ($data != null) {
            $data->delete();
        return back()->with("success","élève supprimer avec succès");

        //     return redirect()->route('dashboard')->with(['message'=> 'Successfully deleted!!']);
        }
        // $data->delete();
        // return redirect('create/list')->with("success","élève supprimer avec succès");
    }
}