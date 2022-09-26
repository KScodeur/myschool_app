@extends('layouts.app')

@section('content')
<main class="mt-5 pt-3 ">
    <h1>
        La liste des élèves par classes
    </h1>
    <div class="mb-2">
      <span>Elèves</span>/
      <span><a href="{{route('createEleve')}}">Inscription</a></span>/
      <span><a href="{{route('readEleve')}}">Liste totale</a></span>/
      <span>Liste par classe</span>

    </div>
    comment faire le join
    @foreach ($classes as $classe)
    <span class="btn btn-primary btn-lg me-2">{{$classe->nom_classe}}</span>
    @endforeach
    <div class="row m-3">
                    {{-- <div class="m-auto"> --}}
                      <table class="table table-striped">
                        {{-- table-striped table-hover --}}
                        <thead>
                          <tr >
                            <th>Numero</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Date de naissance</th>
                            <th>Sexe</th>
                            <th>Classe</th>
                            <th>Matricule</th>
                            <th>Est inscrit</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                      
                        <tbody >
                          @foreach ($sixiemes as $sixieme)
                          <tr>
                              {{-- <td>{{$eleve->id}}</td> --}}
                              <td>{{$loop->index+1}}</td>
                              <td>{{$sixieme->nom}}</td>
                              <td>{{$sixieme->prenom}}</td>
                              <td>{{$sixieme->date_naissance}}</td>
                              <td>{{$sixieme->sexe}}</td>
                              <td>{{$sixieme->classe->nom_classe}}</td>
                              <td>{{$sixieme->prenom}}</td>
                              <td>{{$sixieme->prenom}}</td>
                              <td>
                                <a href="{{url('edit/'.$sixieme->id)}}" class="btn btn-info">Editer</a>
                                <a href="#" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#supprimer">Supprimer</a>
                              </td>
                            </tr>   
                          @endforeach
                        </tbody>
                      </table>
                  {{-- </div> --}}
                  </div>
</main>
@endsection