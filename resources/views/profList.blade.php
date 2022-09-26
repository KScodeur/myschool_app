@extends('layouts.app')

@section('content')
<main class="mt-5 pt-3 ">
   <div class="container-fluid">
    <div class="mx-3">
        <div class="mb-2">
            <div class="col-md-12 fw-bold fs-3 mb-3">La liste des enseignants</div>
            <div>
                <span>Professeurs</span> /<span><a href="{{route('createProf')}}">Nouveau</a></span> /<span>Liste des prof</span>
              </div>
          </div>
     
        <form action="" class="d-flex mr-3">
            <input type="text" name='search' value="{{$search}}" placeholder="rechercher ">
            <button type="submit" class="btn btn-info">
              <i class="bi bi-search" aria-hidden="true"></i>
            </button>
          </form>
        
    
    
        <table  class="table table-striped">
            <thead>
                <tr>
                    <th>N</th>
                    <th>Nom et prenom</th>
                    <th>sexe</th>
                    <th>Date de naissance</th>
                    <th>grade</th>
                    <th>spécialité</th>
                     <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($professeurs as $professeur)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$professeur->nom}} {{$professeur->prenom}}</td>
                        <td>{{$professeur->sexe}}</td>
                        <td>{{$professeur->date_naissance}}</td>
                        <td>{{$professeur->grade}}</td>
                        <td>{{$professeur->specialite}}</td>
                        <td> 
                            <a href="{{url('editprof/'.$professeur->id)}}" class="btn btn-info">Editer</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticsupprimer">
                                Supprimer
                            </button>
                            <!-- Modal de supprimer-->
                            <div class="modal fade" id="staticsupprimer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Supprimer</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Voulez-vous vraiment faire la suppression?</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Non</button>
                                            <a href="{{url('deleteprof/'.$professeur->id)}}" class="btn btn-danger">Oui</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
            @endforeach
           
      
            
            </tbody>
        </table>
   </div>
</div>
    
    <!-- Modal d'ajout de classe-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ajouter une matiere</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                    @csrf
                        <div class="row">
                            <div class="col">
                                <label for="" >Nom de la matiere</label>
                                <input type="text" class="form-control" name="nom_matiere">
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="" >Abbreviation</label>
                                <input type="text" class="form-control" name="">
                            </div>  
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-info">Enregistrer</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
 
</main>
@endsection