@extends('layouts.app')

@section('content')
   <main class="mt-5 pt-3">
    <div class=" mx-3 ">
      <div class="container row">
        <div class="col-md-12 fw-bold fs-3 mb-3">Liste total des élèves</div>
        <div class="mb-2">
          <span>Elèves</span>/
          <span><a href="{{route('createEleve')}}">Inscription</a></span>/
          <span>Liste totale</span>
          {{-- <span><a href="{{route('listByClass')}}">Liste par classe</a></span> --}}

        </div>
      </div>
        {{-- début du tableau --}}
        <div class="container row mt-3 ">
            <div class="m-auto">
              <form action="" class="d-flex mr-3">
                <input type="text" name='search' value="{{$search}}" placeholder="rechercher ">
                <button type="submit" class="btn btn-info">
                  <i class="bi bi-search" aria-hidden="true"></i>
                </button>
              </form>
              {{-- <input type="text"  id="search"/>--}}
              <table class="table table-striped" id="eleves"> 
                {{-- table-striped table-hover --}}
                <thead>
                  <tr >
                    <th>Numero</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Sexe</th>
                    <th>Classe</th>
                    <th>Date de naissance</th>
                    <th>Matricule</th>  
                    {{-- <th>Est inscrit</th> --}}
                    <th>Action</th>
                  </tr>
                </thead> 
              
                <tbody id="tbody">
                  @foreach ($eleves as $eleve)
                  <tr>
                      {{-- <td>{{$eleve->id}}</td> --}}
                      <td>{{$loop->index+1}}</td>
                      <td>{{$eleve->nom}}</td>
                      <td>{{$eleve->prenom}}</td>
                      <td>{{$eleve->sexe}}</td>
                      <td>{{$eleve->classe->nom_classe}}</td>
                      <td>{{$eleve->date_naissance}}</td>
                      <td>elv{{$eleve->id}}</td>
                      {{-- <td>{{$eleve->prenom}}</td> --}}
                      <td>
                        <a href="{{url('edit/'.$eleve->id)}}" class="btn btn-info">Editer</a>
                        {{-- <a href="{{url('delete/'.$eleve->id)}}" class="btn btn-danger">Supprimer</a> --}}
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Supprimer
                        </button>
                         <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <a href="{{url('deleteMatiere/'.$eleve->id)}}" class="btn btn-danger">Oui</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>   
                  @endforeach
                </tbody>
                {{-- <tbody id="Content"></tbody> --}}
                {{-- {{$eleves->links()}} --}}
              </table>
              <!-- Button trigger modal -->
          </div>
          </div>
        {{-- fin du tableeau --}}
         
    </div>
   </main>
   {{-- <script type="text/javascript">
    let search=document.getElementById('search');
      search.addEventListener('input',function() {
        let value = search.value ;
        let tbody = document.getElementById('tbody')
        tbodyinnerHTML=
    });
    
  </script> --}}
  {{-- <script type="text/javascript">
    $('#search').on('keyup',function() {
      $value=$(this).val();
       $.ajax({
          type:'get',
          url: '{{URL::to('search')}}',
          data:{'search':$value},
          success:function(data){
            console.logo(data);
            $('#Content').html(data);
          }
       });
    }) --}}
  {{-- </script> --}}
@endsection