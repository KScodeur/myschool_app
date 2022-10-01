<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Classe;
use PharIo\Manifest\Email;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
// use Symfony\Component\HttpFoundation\Session\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.index');
    }
    public function registration()
    {
        if(Session::has('loginId')){
            Utilisateur::where('id',Session::get('loginId'))->first();
            }else{
                return redirect('/');
            }
        return view('auth.registration');
    }
    public function loginUser(Request $request){
        $request->validate([
                'email'=>'required',
                'password'=>'required|min:5|max:12'
            ]); 
        $utilisateur=Utilisateur::where('email',$request->email)->first();
        if($utilisateur){
            // if(Hash::check($request->password,$utilisateur->password)){
            if($utilisateur=Utilisateur::where('password',$request->password)->first()){
                $request->session()->put('loginId',$utilisateur->id);
                return redirect('/eleve');
                // return view('dashboard');
                  
            }else{
                return back()->with('fail','utilisateur où mot de passe incorrect');
                
            }
        // return view('dashboard');
        }else{
            return back()->with('fail','utilisateur où mot de passe incorrect');
        }
    
}

public function index()
    {
        // $data=array();
        if(Session::has('loginId')){
        $data=Utilisateur::where('id',Session::get('loginId'))->first();
        }else{
            return redirect('/');
        }
        // $eleve=Eleve::get();
        $total=Eleve::count();
        $filles=Eleve::where('sexe','F')->count();
        $garcons=Eleve::where('sexe','M')->count();
        $classes=Classe::get();
        $nbClasses=Classe::count();
        $eleves=Eleve::orderBy("id","desc")->limit(10)->get();
        // $eleve= DB::table('eleves')->find(10);
        // on utilise find(le nombre qu'on veut recuperer) a la place de get()
        // return dd($topTen);
        return view('dashboard',compact('classes','eleves','total','filles','garcons','nbClasses','data'));
        // c'est la variable qui est compacté ici
    }
   
    // pour enregistrer un utilisateur
    public function registerUser(Request $request )
    {
        
         $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'email'=>['required','email'],
            'nom_utilisateur'=>'required',
            'password'=>["required","min:5",'max:12']
        ]); 
        // dd($request);
        $utilisateur=new Utilisateur;
        $utilisateur->nom=$request->nom;
        $utilisateur->prenom=$request->prenom;
        $utilisateur->email=$request->email;
        $utilisateur->nom_utlisateur=$request->nom_utilisateur;
        $utilisateur->password=$request->password;
        
        $register =$utilisateur->save();
        if($register){
            return back()->with("success","admin ajouter avec succès");
        }else{
            return back()->with('fail','something wrong');
        }  
    }
    // pour se deconnecter
    public function logout()
    {
        if(Session::has('loginId'))
        Session::pull('loginId');
        return redirect('/');
        // SweetAlert:: ² 
    }
}


