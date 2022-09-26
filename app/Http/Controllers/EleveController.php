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
   //fonction permettant le dashboard
//    public function authentification()
//    {
//        return view('authentification');
//    }


    // pour inserer un "élève" c-a-dire l"affichage de la page de formulaire
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
                            ->orWhere('nom_classe','LIKE','%'.$search.'%')
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
    // public function search(Request $request){
    //     $eleves=Eleve::where('nom','LIKE','%'.$request->search.'%')->get();
    //     foreach($eleves as $eleve){
    //         $output=
    //         '<tr>
    //         <td>'.$eleve->nom.'</td>
    //         </tr>';
    //     }
    //     return response($output);
    // }
   
    // public function search(){
    //     $eleves=Eleve::get();
    //     $classes=Classe::get();
    //     if(isset($_GET['search'])){
    //         $search=$_GET['search'];
    //         $someone=Eleve::where('nom','LIKE','%'.$search.'%')->get();
    //     return view('getAllEleves',compact('eleves','classes','someone'));
    //     }else{
    //         return view('getAllEleves',compact('eleves','classes'));
    //     }
       
    //     // $search=request()->input('search');
    //     // dd($search);
    //     // $searcheleves=Eleve::where('nom','LIKE','%'.$search.'%')->paginate(6); 
    //     // return view('search',compact('eleves','classes','searcheleves'))->with('searcheleves', $searcheleves);
    //     return view('search',compact('eleves','classes','searcheleves'));
    // }
    // public function search(){
    //     $eleves=Eleve::get();
    //     $classes=Classe::get();
    //     $search=request()->input('search');
    //     // dd($search);
    //     $searcheleves=Eleve::where('nom','LIKE','%'.$search.'%')->paginate(6); 
    //     return view('search',compact('eleves','classes','searcheleves'))->with('searcheleves', $searcheleves);
    // }
    // public function update(Request $request,$id)
    // {
    //     // $eleve=Eleve::get();
    //     // $eleves=Eleve::find($id);
    //     // $eleves->nom = $request->input('nom');
    //     // $eleves->prenom = $request->input('prenom');
    //     // $eleves->date_naissance = $request->input('date_naissance');
    //     // $eleves->lieu_naissance = $request->input('lieu_naissance');
    //     // $eleves->nom_pere = $request->input('nom_pere');
    //     // $eleves->nationalite = $request->input('nationalite');
    //     // $eleves->sexe = $request->input('sexe');
    //     // $eleves->nom_pere = $request->input('nom_pere');
    //     // $eleves->pere_profession = $request->input('pere_profession');
    //     // $eleves->tel = $request->input('tel');
    //     // $eleves->nom_mere = $request->input('nom_mere');
    //     // $eleves->mere_profession = $request->input('mere_profession');
    //     // $eleves->email = $request->input('email');

    //     // $request->update();
     
    //     // $eleves::update($request->all()); 
    //     // $request->update();
    //     // return $this->to($this->generator->action($action, $parameters), $status, $headers);
    //     $data = $request->validate([
    //              "classe_id",
    //              "nom"=>"required",
    //              "prenom"=>"required",
    //              "date_naissance",
    //              "lieu_naissance",
    //              "nom_pere", 
    //              "nationalite",
    //              "sexe", 
    //              "nom_pere", 
    //              "pere_profession", 
    //              "tel",
    //              "nom_mere",
    //              "mere_profession",
    //              "email" ]);

    //     Eleve::update($request->all()); 

    //     $eleves=Eleve::get();
    //     // $eleves->fill($data);
    //     // $eleves->save();

        
    //     return redirect('create/list')->with("success","élève ajouter avec succès"); 
    // }
 
} 
 