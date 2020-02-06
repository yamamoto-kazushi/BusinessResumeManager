<?php
phpinfo();
?>
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>業務経歴書管理システム</title>

        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
		<vue-header></vue-header>
        <router-view></router-view>
		<vue-footer></vue-footer>
		</div>
		<script src="{{ asset('js/app.js') }}" defer></script>
    </body>

</html>
