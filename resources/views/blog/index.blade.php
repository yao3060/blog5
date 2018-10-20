<?php
/**
 * Created by PhpStorm.
 * User: Yao
 * Date: 2018/10/11
 * Time: 12:26
 */
?>
@extends('layouts.app')

@section('title', '| Blog')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Blog</div>
                    <div class="card-body">

                        @foreach($posts as $post)
                            <div class="post">
                                    <h4>
                                        <a href="{{ route('blog.single', $post->name) }}">{{ $post->title }}</a>
                                    </h4>
                                    <div class="post-meta">Published: {{ $post->created_at }}</div>
                                    <div class="excerpt">
                                        {{ mb_substr(trim($post->post_content), 0, 99) }}
                                        {{ strlen(trim($post->post_content) > 99 ? '...' : '') }}
                                    </div>
                                    <hr>
                            </div>
                        @endforeach

                        <div class="text-center">
                            {{ $posts->links() }}
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-md-4">

            </div>
        </div>

    </div>
@endsection
