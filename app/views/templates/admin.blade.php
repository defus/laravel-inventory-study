<?php
/**
 * admin.blade.php 
 * 
 * {File description}
 * 
 * @author Christopher Avendano
 * @created Sep 6, 2014
 * 
 */
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        
        {{ HTML::style('assets/css/bootstrap.min.css') }}
        {{ HTML::style('assets/css/bootstrap-theme.min.css') }}
        @yield('css')
        
        {{ HTML::script('assets/js/jquery.js') }}
        @yield('scripts')
        
    </head>
    <body>
        @yield('content')
    </body>
</html>
