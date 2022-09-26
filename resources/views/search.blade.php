@extends('layouts.app')

@section('content')
   <main class="mt-5 pt-3">
    <div class="container-fluid">
        
        {{-- début du tableau --}}
        <div class="container row mt-3 ">
            <div class="m-auto">
              <form action="{{route('eleves.search')}}" class="d-flex mr-3">
                <input type="search" name='search'>
                <button type="submit" class="btn btn-info">
                  <i class="bi bi-search" aria-hidden="true"></i>
                </button>
              </form>
              <table class="table table-striped">
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
                    <th>Est inscrit</th>
                    <th>Action</th>
                  </tr>
                </thead>
                  
                <tbody >
                  @foreach ($eleves as $eleve)
                  <tr>
                      {{-- <td>{{$eleve->id}}</td> --}}
                      <td>{{$loop->index+1}}</td>
                      <td>{{$eleve->nom}}</td>
                      <td>{{$eleve->prenom}}</td>
                      <td>{{$eleve->sexe}}</td>
                      <td>{{$eleve->classe->nom_classe}}</td>
                      <td>{{$eleve->date_naissance}}</td>
                      <td>{{$eleve->prenom}}</td>
                      <td>{{$eleve->prenom}}</td>
                      <td>
                        <a href="{{url('edit/'.$eleve->id)}}" class="btn btn-info">Editer</a>
                        <a href="{{url('delete/'.$eleve->id)}}" class="btn btn-danger">Supprimer</a>
                      </td>
                    </tr>   
                  @endforeach
                </tbody>
              </table>
          </div>
          </div>
        {{-- fin du tableeau --}}
    
    </div>
   </main>
@endsection