@extends('template')

@section('titre')
    <h1>Liste des projets</h1>
@endsection

@section('contenu')
    @foreach($projects as $project)
        <h2>{{ $project->title }}</h2>
        <p>{{ $project->resume }}</p>
        <img class="img-project" src="{{ $project->imageurl }}" alt="imageProject" >
        <a href="{{ route('ficheProjet', [$project->id]) }}">Voir le projet</a>
        <hr>
    @endforeach
@endsection