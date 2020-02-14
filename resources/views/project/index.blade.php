@extends('layouts.app')

@section('content')
    <div class="project-list">
        @foreach($projects as $project)
            <project-preview name="{{ $project->name }}" desc="{{ $project->desc }}"></project-preview>
        @endforeach
    </div>
@endsection()
