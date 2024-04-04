<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>@yield('title', 'Blog Website')</title>
    
</head>

<body class="container mx-auto max-w-4xl">
    @yield('content')
    </div>
</body>

</html>
