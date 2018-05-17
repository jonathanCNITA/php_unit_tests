@extends('template')

@section('titre')
    <h1>{{ $project->title }}</h1>
@endsection

@section('contenu')
        <p>{{ $project->created_at }} by <strong>{{ $project->auth }}</strong></p>
        <p>{{ $project->content }}</p>
        <img class="img-project" src="{{ $project->imageurl }}" alt="imageProject">
@endsection