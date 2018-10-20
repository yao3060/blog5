@extends('layouts.app')

@section('title', '| About')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-8">
                <div class="title m-b-md">
                    About {{ $data['fullname'] }}
                </div>
                <p>{{ $data['email']  }}</p>

                <div class="links">
                    <a href="/">Home</a>
                    <a href="/about">About</a>
                    <a href="/contact">Contact</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>

        </div>

    </div>

@endsection
