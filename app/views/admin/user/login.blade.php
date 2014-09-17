<?php
/**
 * login.blade.php 
 * {File description}
 * 
 * @author Christopher Avendano
 * @created Sep 17, 2014
 * 
 */
?>
{{-- Page template --}}
@extends('templates.normal')

{{-- Page title --}}
@section('title')
    
@stop

{{-- Page specific CSS files --}}
{{-- {{ HTML::style('--Path to css--') }} --}}
@section('css')
    
@stop

{{-- Page specific JS files --}}
{{-- {{ HTML::script('--Path to js--') }} --}}
@section('scripts')

@stop

{{-- Page content --}}
@section('content')
<div class="col-sm-5">
    {{ Form::open(array('url' => Request::url() , 'id' => 'login' , 'class' => 'form-horizontal' )) }}
    <div class="form-group">
        {{ Form::label('email', 'Email',array('class' => 'container-label col-sm-2')) }}
        <div class="col-sm-10">
            {{ Form::text('email', Input::old('email'), array('class' => 'col-sm-8' ) ) }}
        </div>
        {{ $errors->first('email') }}
    </div>
    <div class="form-group">
        {{ Form::label('password', 'Password',array('class' => 'container-label col-sm-2')) }}
        <div class="col-sm-10">
            {{ Form::password('password',  array('class' => 'col-sm-8' ) ) }}
        </div>
        {{ $errors->first('password') }}
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {{ Form::submit('Login') }}
        </div>
    </div>
    {{ Form::close() }}
</div>
@stop