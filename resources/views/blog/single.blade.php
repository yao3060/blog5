<?php
/**
 * Created by PhpStorm.
 * User: Yao
 * Date: 2018/10/11
 * Time: 2:03
 */
?>

@extends('layouts.app')

@section('title', '| ')


@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">
                        Home / Blog / {{ $post->title }}
                    </div>
                    <div class="card-body">


                    <h1>{{ $post->title }}</h1>

                        <div class="post-meta">

                        </div>

                    <div class="post-content">
                        {!! \Xmeltrut\Autop\Autop::format($post->post_content); !!}
                    </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>

@endsection
