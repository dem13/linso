@extends('layouts.app')

@section('content')
    <div class="section">
        @foreach($projects as $project)
            <project-preview name="{{ $project->name }}" desc="{{ $project->desc }}"></project-preview>
        @endforeach
    </div>
@endsection()
