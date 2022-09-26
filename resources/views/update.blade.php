@extends('layouts.app')

@section('content')
{{-- <main class="mt-5 pt-3 ">
           
    <div>
       @if ($errors->any())
       <ul>
            @foreach ($errors->all() as $error)
                <li class="alert alert-success col-md-12 fw-bold fs-3">{{$error}}</li>
             @endforeach
        </ul>
       @endif
       
    </div>
    <form  method="POST" action="{{url('update-data/'.$eleves->id)}}" class="container-fluid">
        <div class="row">
            @if(session()->has("success"))
            <div class="alert alert-success">
             {{session()->get('success')}}
            </div>
         @endif
        </div>
        @csrf
        <h1>CONNEXION</h1>
        @method('PUT')
        <div>
            <div><label for="">classe</label></div>
            <div>
                <select name="classe_id" ></select>
            </div>
        </div>
        <div>
            <div><label for="">date de naissance</label> </div>
            <div><input type="date" placeholder="mettre la date de naissance" name="date_naissance" value="{{$eleves->date_naissance}}"></div> 
        </div>
        <div>
          <div><label for="">lieu de naissance</label> </div>
          <div><input type="text" placeholder="mettre la date de naissance" name="lieu_naissance" value="{{$eleves->lieu_naissance}}"></div> 
      </div>
        <div>
            <div><label for="">nationalité</label> </div>
            <div><input type="text" placeholder="la mass du prix" name="nationalite" value="{{$eleves->nationalite}}"></div> 
        </div>
        
        <div>
            <div><label for="">Nom du pere</label> </div>
            <div><input type="text" placeholder="mettre la date de naissance" name="nom_pere" value="{{$eleves->nom_pere}}"></div> 
        </div>
        <div>
            <div><label for="">profession du pere</label> </div>
            <div><input type="text" placeholder="mettre la date de naissance" name="pere_profession" value="{{$eleves->pere_profession}}"></div> 
        </div>
        <div>
            <div><label for="">Numéro de telephone</label> </div>
            <div><input type="text" placeholder="mettre la date de naissance" name="tel" value="{{$eleves->tel}}"></div> 
        </div>
        <div>
            <div><label for="">Nom du mère</label> </div>
            <div><input type="text" placeholder="mettre la date de naissance" name="nom_mere" value="{{$eleves->nom_mere}}"></div> 
        </div>
        <div>
            <div><label for="">profession du mere</label> </div>
            <div><input type="text" placeholder="mettre la date de naissance" name="mere_profession" value="{{$eleves->mere_profession}}"></div> 
        </div>
        <div>
            <div><label for="">email</label> </div>
            <div><input type="text" placeholder="mettre la date de naissance" name="email" value="{{$eleves->email}}"></div> 
        </div>
        <div class="container-button2">
            <div>
                <button>Annuler</button>
            </div>
            <div>
                <button type="submit" name="">Envoyer</button>
            </div>
        </div>
    </form>
</main> --}}

    <main class="mt-5 pt-3 ">
        {{-- <div class="modal-content"> --}}
            {{-- <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> --}}
            <div class="mx-3 pb-3">
                <div>
                    @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="alert alert-success col-md-12 fw-bold fs-3">{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <form  method="POST" action="{{url('update-data/'.$eleves->id)}}" class="container-fluid">
                    <div class="row">
                        @if(session()->has("success"))
                        <div class="alert alert-success">
                            {{session()->get('success')}}
                        </div>
                        @endif
                        {{-- <div class="col-md-12 fw-bold fs-3 ">Dashboard</div> --}}
                    </div>
                    @csrf
                    {{-- <h1>Modifier les informations</h1> --}}
                    <div class="col-md-12 fw-bold fs-3 mb-3">Modifier les informations</div>
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col">
                            <label for="">Nom</label>
                            <input type="text" class="form-control" placeholder="veiller entrer le nom" name="nom"  value="{{$eleves->nom}}">
                        </div>
                        <div class="col">
                            <label for="">Prénom</label>
                            <input type="text" class="form-control" placeholder="mettre la description" name="prenom"  value="{{$eleves->prenom}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="">Sexe</label>
                            <select name="sexe"  class="form-select">
                            {{-- <option value="">Selectionner le sexe</option> --}}
                            <option value="F" {{$eleves->sexe=="f"  ? 'selected':''}}>Fille</option>
                            <option value="M" {{$eleves->sexe=="m"  ? 'selected':''}}>Garçons</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Classe</label>
                            <select name="classe_id" id="" class="form-select">
                                @foreach ($classes as $classe)
                                <option value="{{$classe->id}}" {{$classe->nom_classe== $classe->id  ? 'selected':''}}>{{$classe->nom_classe}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                        <label for="">date de naissance</label>
                        <input type="date" class="form-control" placeholder="mettre la date de naissance" name="date_naissance"  value="{{$eleves->date_naissance}}">
                        </div>
                        <div class="col">
                        <label for="">Lieu de naissance</label>
                        <input type="text" class="form-control" placeholder="mettre la date de naissance" name="lieu_naissance"  value="{{$eleves->lieu_naissance}}" value="{{$eleves->lieu_naissance}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="">Nationalité</label>
                            <input type="text" class="form-control" name="nationalite"  value="{{$eleves->nationalite}}">
                        </div>
                        <div class="col">
                            <label for="">Nom du père</label>
                            <input type="text" class="form-control" name="nom_pere"  value="{{$eleves->nom_pere}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="">Profession du père</label>
                            <input type="text" class="form-control" name="pere_profession"  value="{{$eleves->pere_profession}}">
                        </div>
                        <div class="col">
                            <label for="">Numero du père</label>
                            <input type="text" class="form-control" name="tel"  value="{{$eleves->tel}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="">Nom de la mère</label>
                            <input type="text" class="form-control" name="nom_mere"  value="{{$eleves->nom_mere}}">
                        </div>
                        <div class="col">
                            <label for="">Profession de la mère</label>
                            <input type="text" class="form-control" name="mere_profession"  value="{{$eleves->mere_profession}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="" >Email</label>
                            <input type="text" class="form-control" name="email"  value="{{$eleves->email}}">
                        </div>  
                    </div>
                    </div>
                    <div class="modal-footer me-3">
                        <a type="button" class="btn btn-danger" data-bs-dismiss="modal" href="/eleve">Annuler</a>
                        <button type="submit" class="btn btn-info" data-bs-toggle="modal">Enregistrer</button>
                    </div>
                </form>
            
        {{-- </div> --}}
    </main>
@endsection