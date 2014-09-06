<?php
/**
 * index.blade.php 
 * {File description}
 * 
 * @author Christopher Avendano
 * @created Sep 6, 2014
 * 
 */
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
{{ HTML::script('assets/js/admin/items/items.js') }}

@stop

{{-- Page content --}}
@section('content')
 <div class="col-sm-12">
     @if( !empty( Session::get('message') ) )
    <span class="col-sm-5 alert alert-success" role='alert'> {{ Session::get('message') }}</span>
    @endif
</div>
<div class="col-sm-5">
    @if( isset( $items ) & !empty( $items ) )
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
        </thead>
        <tbody>
            @foreach( $items as $value )
            <tr class="edit-item" data-id='{{{ $value->id }}}'>
                <td> {{{ $value->id }}} </td>
                <td> {{{ $value->name }}} </td>
                <td> {{{ $value->description }}} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    </div>
    <div class="col-sm-12">
        {{ Form::button('Add item',array('class'=> 'btn btn-link' , 'id' => 'add_item')); }}
    </div>
@stop