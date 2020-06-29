<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{url(mix('site/css/style.css'))}}">
</head>
<body>

@yield('content')

<script src="{{url(mix('site/js/jquery.js'))}}"></script>
<script src="{{url(mix('site/js/bootstrap.js'))}}"></script>
</body>
</html>
