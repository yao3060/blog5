<?php
/**
 * Created by PhpStorm.
 * User: Yao
 * Date: 2018/10/9
 * Time: 6:45
 */
?>


@extends('layouts.app')

@section('title', '| Posts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">


                <h1>Posts <a class="btn btn-xs btn-success" href="{{ route('posts.create') }}">Create New Post</a></h1>

                @if( $message = Session::get('success'))

                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>

                @endif

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Excerpt</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $posts as $post)

                        <tr>
                            <td>{{ $post->id }}</td>
                            <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                            <td>{{ mb_substr($post->post_content, 0, 99) }} {{ mb_strlen($post->post_content) > 99 ? '...' : '' }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('posts.show', $post->id) }}">Show</a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-xs btn-primary">Edit</a>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>

                {!! $posts->links() !!}

            </div>


            <div class="col-md-4"></div>
        </div>
    </div>
@endsection
