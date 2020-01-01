<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css"/>
    <title>Laravel</title>
</head>
<body>
<div id="app">
    <main-app></main-app>
</div>
<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>
</html>
