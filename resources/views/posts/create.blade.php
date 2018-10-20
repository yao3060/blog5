<?php
/**
 * Created by PhpStorm.
 * User: Yao
 * Date: 2018/10/9
 * Time: 6:08
 */
?>
@extends('layouts.app')

@section('title', '| Create New Post')

@section('stylesheets')

    {{ Html::style('css/parsley.css') }}

@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">


                <h1>Create New Post</h1>

                {!! Form::open(['route' => 'posts.store', 'method' => 'POST', 'data-parsley-validate' => '']) !!}
                {{--@include('posts.form')--}}
                {{ Form::label('title', 'Title:') }}
                {!! Form::text('title', null, [
                    'placeholder' => 'Title',
                    'class' => 'form-control',
                    'required' => 'title is required',
                    'maxlength' => 255
                ]) !!}

                {{ Form::label('name', 'Name:') }}
                {!! Form::text('name', null, ['placeholder' => 'Slug', 'class' => 'form-control']) !!}

                {{ Form::label('post_content', 'Content:') }}
                {!! Form::textarea('post_content', null, [
                    'placeholder' => 'Content',
                    'class' => 'form-control',
                    'required' => ''
                ]) !!}

                {{ Form::submit('Create Post', ['class' => 'btn btn-success', 'style' => 'margin-top:20px']) }}

                {!! Form::close() !!}

            </div>
        </div>
    </div>


@endsection

@section('script')

    {{ Html::script('js/parsley.min.js?ver=' . env('APP_VERSION', '1.0.0')) }}
    {{ Html::script('js/zh_cn.js?ver=' . env('APP_VERSION', '1.0.0')) }}

@endsection
