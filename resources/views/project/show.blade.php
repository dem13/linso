@extends('layouts.app')

@section('content')
    <project
        id="{{ $project->id }}"
        name="{{ $project->name }}"
        desc="{{ $project->desc }}"
        :links="JSON.parse('{{ json_encode($links) }}')"
    ></project>
@endsection()
