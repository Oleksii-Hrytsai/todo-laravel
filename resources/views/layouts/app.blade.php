<!doctype html>
<html lang="ru">
<head>
    @include('layouts.includes.meta_data')
    <link href="/css/style.css" rel="stylesheet">
    <script src="./js/app.js"></script>
</head>
<body class="bg-grayBg">
    <div>
        @yield('content')
    </div>
    @include('layouts.pages.chat')


</body>
</html>
