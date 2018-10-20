@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Latest Posts</div>
                <div class="card-body">
                    <ul>
                        @foreach( $latest_posts as $post)
                            <li><a href="{{ url('blog/' . $post->name) }}">{{ $post->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
