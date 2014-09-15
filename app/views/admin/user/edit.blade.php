<?php
/**
 * edit.blade.php 
 * 
 * @author Christopher Avendano
 * @created Sep 13, 2014
 * 
 */
$labelStyles = 'col-sm-2 control-label';
$containerSize = 'col-sm-10';
$errorMessageContainer = '<p>:message</p>';

?>
{{-- Page template --}}
@extends('templates.admin')

{{-- Page title --}}
@section('title')
Edit user
@stop

{{-- Page specific CSS files --}}
{{-- {{ HTML::style('--Path to css--') }} --}}
@section('css')

@stop

{{-- Page specific JS files --}}
{{-- {{ HTML::script('--Path to js--') }} --}}
@section('scripts')
    {{ HTML::script('assets/js/admin/users.js') }}
@stop

{{-- Page content --}}
@section('content')

<div class="container col-sm-5">
    {{ Form::open(array('url' => Request::url() , 'role' => 'form' ,'class' => 'form-horizontal')) }}
    <div class="form-group">
        {{ Form::label('first_name', 'First name' , array( 'class' => $labelStyles ) ) }}
        <div class="{{$containerSize}}">
            {{ Form::text('first_name', Input::old('first_name', $user->first_name) , array('style' => '') ); }}
        </div>
        {{ $errors->first('first_name', $errorMessageContainer ) }}
    </div>

    <div class="form-group">
        {{ Form::label('last_name', 'Last name' , array( 'class' => $labelStyles ) ) }}
        <div class="{{$containerSize}}">
            {{ Form::text('last_name', Input::old('last_name',$user->last_name) , array() ); }}
        </div>
        {{ $errors->first('last_name', $errorMessageContainer ) }}
    </div>
    <div class="form-group">
        {{ Form::label('email', 'Email address' , array( 'class' => $labelStyles ) ) }}
        <div class="{{$containerSize}}">
            {{ Form::text('email', Input::old('email',$user->email) , array() ); }}
        </div>
        {{ $errors->first('email', $errorMessageContainer ) }}
    </div>
    <div class="form-group">
        {{ Form::label('old_password', 'Password' , array( 'class' => $labelStyles ) ) }}
        <div class="{{$containerSize}}">
            {{ Form::password('old_password', array() ); }}
        </div>
        {{ $errors->first('old_password', $errorMessageContainer ) }}
    </div>
    <div class="form-group">
        {{ Form::label('password', 'New Password' , array( 'class' => $labelStyles ) ) }}
        <div class="{{$containerSize}}">
            {{ Form::password('password', array() ); }}
        </div>
        {{ $errors->first('password', $errorMessageContainer ) }}
    </div>
    <div class="form-group">
        {{ Form::label('password_confirmation', 'Confirm new password' , array( 'class' => $labelStyles ) ) }}
        <div class="{{$containerSize}}">
            {{ Form::password('password_confirmation' , array() ); }}
        </div>
        {{ $errors->first('password_confirmation', $errorMessageContainer ) }}
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {{ Form::hidden('id', $user->id ) }}
            {{ Form::submit('Update user' , array('class' => 'btn btn-default')  ) }}
            {{ Form::button('Delete user' , array('class' => 'btn btn-danger' , 'id' => 'btn_delete' , 'data-id' => $user->id )  ) }}
        </div> 
    </div>
    {{ Form::close() }}
</div>

@stop