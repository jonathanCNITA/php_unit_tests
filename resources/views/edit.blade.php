@extends('template')

@section('titre')
    <h1>Edit section</h1>
    <h2>{{ $project->title }}</h2>
@endsection

@section('contenu')
        <p>{{ $project->created_at }} by <strong>{{ $project->autor }}</strong></p>
        <p>{{ $project->content }}</p>
        <img class="img-project" src="{{ $project->imageurl }}" alt="imageProject">
        <h2>Contribuer</h2>
        <a href="/donate" <button id="contribuer" class="btn btn-info">faire un don</button></a>
@endsection