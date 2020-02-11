@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                @csrf
                <project-form
                    method="put"
                    csrf="{{ csrf_token() }}"
                    action="{{ route('project.update', ['project' => $project->id]) }}"
                    name="{{ old('name', $project->name) }}"
                    desc="{{ old('desc', $project->desc) }}"
                ></project-form>
            </div>
        </div>
    </div>
@endsection
