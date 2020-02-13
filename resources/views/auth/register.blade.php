@extends('layouts.app')

@section('content')
    <div class="container">

        @if($errors->any())
            @foreach($errors->all() as $error)
                <b-notification
                    type="is-danger"
                    aria-close-label="Close notification"
                    role="alert">
                    {{ $error }}
                </b-notification>
            @endforeach
        @endif

        <div class="card">
            <div class="card-header">
                <div class="card-header-title">
                    Registration
                </div>
            </div>
            <div class="card-content">
                <register-form></register-form>
            </div>
        </div>
    </div>
@endsection
