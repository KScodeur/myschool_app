@extends('layouts.app')

@section('content')


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
            <form  method="POST" action="{{url('update-matiere/'.$matieres->id)}}" class="container-fluid">
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
                        <label for="">Classe</label>
                        <input type="text" class="form-control" placeholder="veiller entrer le nom" name="nom_matiere"  value="{{$matieres->nom_matiere}}">
                    </div>
                    
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="">Scolarité</label>
                        <input type="text" class="form-control" placeholder="mettre la description" name="abreviation"  value="{{$matieres->abreviation}}">
                    </div>
                   
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-danger" data-bs-dismiss="modal" href="/matieres">Annuler</a>
                    <button type="submit" class="btn btn-info" data-bs-toggle="modal">Enregistrer</button>
                </div>
            </form>
        </div>
</main>
    
@endsection