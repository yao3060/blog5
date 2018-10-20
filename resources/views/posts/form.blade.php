<?php
/**
 * Created by PhpStorm.
 * User: Yao
 * Date: 2018/10/9
 * Time: 7:14
 */
?>

    <div class="form-group">
        <label for="post-title">Title</label>
        {!! Form::text('title', null, ['placeholder' => 'Title', 'class' => 'form-control']) !!}
        {!! Form::text('name', null, ['placeholder' => 'Slug', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <label for="post-content">Content</label>
        {!! Form::textarea('content', null, [
        'placeholder' => 'Content',
        'class' => 'form-control',
        'style' => 'height:200px'
        ]) !!}
    </div>

<div class="form-group">
    <a href="{{ route('posts.index') }}" class="btn btn-xs btn-success">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
