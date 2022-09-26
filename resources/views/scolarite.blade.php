@extends('layouts.app')

@section('content')
<main class="mt-5 pt-3 ">
   <div class="container-fluid">
    <div class="mx-3">
        <div class="">
            <div class="col-md-12 fw-bold fs-3 mb-3">La liste de tous les classes</div>
          </div>
            
        
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Ajout de classe
        </button>
        
    
    
        <table  class="table table-striped">
            <thead>
                <tr>
                    <th>N</th>
                    <th>Classe</th>
                    <th>Scolarité de la Classe</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($classes as $classe)
                <tr>
                    <td>{{$classe->id}}</td>
                    <td>{{$classe->nom_classe}}</td>
                    <td>{{$classe->scolarite}}</td>
                    <td> 
                        <a href="{{url('editclasse/'.$classe->id)}}" class="btn btn-info">Editer</a>
                        {{-- <a href="#" class="btn btn-danger">Supprimer</a> --}}
                        {{-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBack">
                            Supprimer
                        </button> --}}
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
                    <h5 class="modal-title" id="staticBackdropLabel">Ajouter une classe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('storeClasse')}}" method="post">
                    @csrf
                        <div class="row">
                            <div class="col">
                                <label for="" >La classe</label>
                                <input type="text" class="form-control" name="nom_classe">
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="" >Scolarité</label>
                                <input type="text" class="form-control" name="scolarite">
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
     <!-- Modal de supprimer-->
     <div class="modal fade" id="staticBack" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
              <a href="{{url('deleteClasse/'.$classe->id)}}" class="btn btn-danger">Oui</a>
            </div>
          </div>
        </div>
      </div>
</main>
@endsection