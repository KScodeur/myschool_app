@extends('layouts.app')

@section('content')
  <main class="mt-5 pt-3 ">
    <div class="mx-3">
      {{-- <div>
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> --}}
      <div class="pb-3">
        <div>
          @if ($errors->any())
          <ul>
                @foreach ($errors->all() as $error)
                    <li class="alert alert-success col-md-12 fw-bold fs-3">{{$error}}</li>
                @endforeach
            </ul>
          @endif
        </div>
        <form  method="POST" action="{{route('storeProf')}}" class="container-fluid">
          <div class="row">
              @if(session()->has("success"))
              <div class="alert alert-success">
                {{session()->get('success')}}
              </div>
            @endif
            {{-- <div class="col-md-12 fw-bold fs-3 ">Dashboard</div> --}}
          </div>
          @csrf
        <div class="col-md-12 fw-bold fs-3 mb-3">Enregistrer un Professeur</div>
          <div class="mb-2">
            <span>Professeurs</span> /<span>Nouveau</span> /<span><a href="{{route('readProf')}}">Liste des prof</a></span>
          </div>
          <div class="row mb-3">
            <div class="col">
                <label for="">Nom</label>
                <input type="text" class="form-control" placeholder="veiller entrer le nom" name="nom">
            </div>
            <div class="col">
                <label for="">Prénom</label>
                <input type="text" class="form-control" placeholder="mettre la description" name="prenom">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
                <label for="">Sexe</label>
                <select name="sexe" id="" class="form-select">
                  <option value="">Selectionner le sexe</option>
                  <option value="F" name="sexe">Femme</option>
                  <option value="M" name="sexe">Homme</option>
                </select>
            </div>
          
            <div class="col">
              <label for="">Matière</label>
              <select name="nom_matiere" id="" class="form-select">
                <option>Selectionner la matière</option>
              @foreach ($matieres as $matiere)
                <option value="{{$matiere->id}}">{{$matiere->nom_matiere}}</option>
              @endforeach
              </select>
            </div>
        </div>
          <div class="row mb-3">
              <div class="col">
                <label for="">date de naissance</label>
                <input type="date" class="form-control" placeholder="mettre la date de naissance" name="date_naissance">
              </div>
              <div class="col">
                <label for="">Lieu de naissance</label>
                <input type="text" class="form-control" placeholder="mettre la date de naissance" name="lieu_naissance">
              </div>
          </div>
          <div class="row mb-3">
            <div class="col">
                <label for="">Nationalité</label>
                <input type="text" class="form-control" name="nationalite">
            </div>
            <div class="col">
                <label for="">Numero</label>
                <input type="text" class="form-control" name="">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
                <label for="">Grade</label>
                <input type="text" class="form-control" name="grade">
            </div>
            <div class="col">
                <label for="">specialite</label>
                <input type="text" class="form-control" name="specialite">
            </div>
          </div>
          <div class="row">
            <div class="col">
                <label for="" >Email</label>
                <input type="text" class="form-control" name="email">
            </div>  
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-info" data-bs-toggle="modal">Enregistrer</button>
          </div>
        </form>
      
    </div>
  </main>
@endsection
