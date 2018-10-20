<?php
/**
 * Created by PhpStorm.
 * User: Yao
 * Date: 2018/10/9
 * Time: 18:58
 */
?>

@extends('layouts.app')

@section('title', '| View Post')

@section('content')

    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    Featured
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>

                    <div class="card-text">

                        {!! \Xmeltrut\Autop\Autop::format($post->post_content); !!}

                    </div>

                    <div class="alert alert-secondary">
                        <strong>Created At:</strong> {{ date('Y-m-d H:i', strtotime($post->created_at)) }}<br>
                        <strong>Updated At:</strong> {{ date('Y-m-d H:i', strtotime($post->updated_at)) }}
                    </div>

                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="row">
                <div class="col-sm-4">
                    {!! Html::linkRoute('posts.edit', 'Edit', [$post->id], ['class' => "btn btn-xs btn-block btn-primary"]) !!}
                </div>
                <div class="col-sm-4">
                    {!! Form::open([
                        'route' => ['posts.destroy', $post->id],
                        'method' => 'DELETE'
                    ]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-xs btn-block btn-danger']) !!}
                    {!! Form::close() !!}
                </div>
                <div class="col-sm-4">
                    {!! Html::linkRoute('posts.index', 'All Posts', [], ['class'=>'btn btn-block btn-default']) !!}
                </div>
            </div>

        </div>
    </div>

@endsection
