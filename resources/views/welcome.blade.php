@extends('layouts.app')

@section('main')
    <div class="linso">
        <div class="linso__image">
            <img src="{{ asset('img/logo/logo_main.png') }}" alt="">
        </div>
        <div class="linso__title ">
            <h1 class="is-size-1">Linso</h1>
            <div class="is-size-5 linso__desc">
                <span>Created to help you develop and maintain your apps</span>
            </div>
            <div class="linso__signup is-flex">
                <div>
                    <a class="button is-primary" href="/register">
                        <strong>Sign up</strong>
                    </a>
                </div>
                <div>
                    to get started
                </div>
            </div>
        </div>
    </div>
@endsection
