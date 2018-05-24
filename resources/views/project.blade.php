@extends('template')

@section('titre')
    <h1>{{ $project->title }}</h1>
@endsection

@section('contenu')
        <p>{{ $project->created_at }} by <strong>{{ $project->autor }}</strong></p>
        <p>{{ $project->content }}</p>
        <img class="img-project" src="{{ $project->imageurl }}" alt="imageProject">
        <h2>Contribuer</h2>
        <a href="/donate" <button id="contribuer" class="btn btn-info">faire un don</button></a>
        @if($project->user_id == $user->id)
            <a href="/project/edit/{{ $project->id }}" <button id="edit" class="btn btn-info">edit</button></a>
        @endif
@endsection