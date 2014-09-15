<?php
/**
 * index.blade.php 
 * {File description}
 * 
 * @author Christopher Avendano
 * @created Sep 7, 2014
 * 
 */
?>
{{-- Page template --}}
@extends('templates.admin')

{{-- Page title --}}
@section('title')
Users   
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
<h1>Users </h1>
<div class="col-sm-5">
    @if( isset( $users ) & !empty( $users ) )
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <th>ID</th>
        <th>First name</th>
        <th>Last name</th>
        </thead>
        <tbody>
            @foreach( $users as $value )
            <tr class="edit-item" data-id='{{{ $value->id }}}'>
                <td> {{{ $value->id }}} </td>
                <td> {{{ $value->first_name }}} </td>
                <td> {{{ $value->last_name }}} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
<div class="col-sm-12">
    {{ link_to('admin/users/add', 'Add User', $attributes = array('class' => 'btn-link')) }}
</div>
@stop