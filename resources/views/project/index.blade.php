@extends('layouts.app')

@section('content')
    <project-list projects_json="{{ json_encode($projects) }}"></project-list>
@endsection()
