@extends('main')

@section('title', '| Welcome Home')

@section('content')

    <div class="row">
        <div class="col-8">
            <h1>Welcome</h1>

            <ul>
                @foreach( $latest_posts as $post)
                    <li><a href="{{ url('blog/' . $post->name) }}">{{ $post->title }}</a></li>
                @endforeach
            </ul>

        </div>
        <div class="col-4">
            <h2>Sidebar</h2>
        </div>
    </div>

@endsection
