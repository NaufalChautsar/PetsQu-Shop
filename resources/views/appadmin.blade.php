<!DOCTYPE html>
<html lang="en" class="bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/5401602ad2.js" crossorigin="anonymous"></script>
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="w-full min-h-screen text-gray-900 bg-gray-50 flex flex-col lg:flex-row">
        @yield('sidebar')
        @yield('content')
    </div>
</body>
</html>