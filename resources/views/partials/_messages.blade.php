<?php
/**
 * Created by PhpStorm.
 * User: Yao
 * Date: 2018/10/9
 * Time: 21:20
 */
?>

@if ( Session::has('success') )

    <div class="alert alert-success">

        <strong>Success:</strong> {{ Session::get('success') }}

    </div>

@endif

@if ( count($errors) > 0 )

    <div class="alert alert-danger">
        <strong>Errors:</strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
