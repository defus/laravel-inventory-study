<?php
/**
 * add.blade.php 
 * {File description}
 * 
 * @author Christopher Avendano
 * @created Sep 6, 2014
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
Add item
@stop

{{-- Page specific CSS files --}}
{{-- {{ HTML::style('--Path to css--') }} --}}
@section('css')

@stop

{{-- Page specific JS files --}}
{{-- {{ HTML::script('--Path to js--') }} --}}
@section('scripts')
    {{ HTML::script('assets/js/admin/items.js') }}
@stop

{{-- Page content --}}
@section('content')
<div class="container col-sm-5">
    {{ Form::open(array('url' => 'admin/items/edit/' . $data['id'] , 'role' => 'form' ,'class' => 'form-horizontal')) }}
    <div class="form-group">
        {{ Form::label('name', 'Name' , array( 'class' => $labelStyles ) ) }}
        <div class="{{$containerSize}}">
            {{ Form::text('name', Input::old('name' , $data['name']) , array('style' => '') ); }}
        </div>
        {{ $errors->first('name', $errorMessageContainer ) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description' , array( 'class' => $labelStyles ) ) }}
        <div class="{{$containerSize}}">
            {{ Form::textarea('description', Input::old('description' , $data['description']) , array() ); }}
        </div>
        {{ $errors->first('description', $errorMessageContainer ) }}
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            {{ Form::hidden( 'id' ,$data['id']) }}
            {{ Form::submit('Update' , array('class' => 'btn btn-default')  ) }}
            {{ Form::button('Delete' , array('class' => 'btn btn-danger' , 'id' => 'btn_delete' , 'data-id' => $data['id'] )  ) }}
        </div> 
        
    </div>
    {{ Form::close() }}
</div>

@stop