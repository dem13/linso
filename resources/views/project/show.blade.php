@extends('layouts.app')

@section('content')
    <project id="{{ $project->id }}" name="{{ $project->name }}" desc="{{ $project->desc }}"></project>
@endsection()
