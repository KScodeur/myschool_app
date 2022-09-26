@extends('layouts.app')

@section('content')
    <main class="mt-5 pt-3 ">
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
                <form  method="POST" action="{{url('update-prof/'.$professeurs->id)}}" class="container-fluid">
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
                            <input type="text" class="form-control" placeholder="veiller entrer le nom" name="nom"  value="{{$professeurs->nom}}">
                        </div>
                        <div class="col">
                            <label for="">Prénom</label>
                            <input type="text" class="form-control" placeholder="mettre la description" name="prenom"  value="{{$professeurs->prenom}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="">Sexe</label>
                            <select name="sexe"  class="form-select">
                            <option value="F" {{$professeurs->sexe=="f"  ? 'selected':''}}>Femme</option>
                            <option value="M" {{$professeurs->sexe=="m"  ? 'selected':''}}>Homme</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Date de naissance</label>
                            <input type="date" class="form-control" placeholder="" name="date_naissance"  value="{{$professeurs->date_naissance}}">
                            
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                        <label for="">Grade</label>
                        <input type="text" class="form-control" placeholder="mettre le grade" name="grade"  value="{{$professeurs->grade}}">
                        </div>
                        <div class="col">
                        <label for="">Spécialité</label>
                        <input type="text" class="form-control" placeholder="mettre la specialité" name="specialite"  value="{{$professeurs->specialite}}">
                        </div>
                    </div>
                   
                    <div class="modal-footer ">
                        <a type="button" class="btn btn-danger" data-bs-dismiss="modal" href="/prof/list">Annuler</a>
                        <button type="submit" class="btn btn-info" data-bs-toggle="modal">Enregistrer</button>
                    </div>
                </form>
            
        {{-- </div> --}}
    </main>
@endsection