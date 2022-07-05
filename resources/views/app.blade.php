<!DOCTYPE html>
<html lang="en" class="bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/5401602ad2.js" crossorigin="anonymous"></script>
    <title>PetsQu Shop</title>
</head>
<body>
    
    @yield('navbar')
    @yield('content')

    <!-- Footer -->
        <footer class="py-10 px-12 bg-primary h-1/2 md:px-20 lg:px-32 xl:px-40 laptop:px-60">
            <div class="flex justify-between">
                <div class="mb-6 md:mb-0">
                    <a href="{{ route('beranda.index') }}" class="flex items-center">
                        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">PetsQu Shop</span>
                    </a>
                </div>
                <div class="">
                    <h2 class="mb-2 text-sm font-semibold text-white uppercase">Menu</h2>
                    <ul class="text-gray-600 dark:text-gray-400">
                        <li class="mb-2">
                            <a href="https://flowbite.com/" class="hover:underline">Beranda</a>
                        </li>
                        <li>
                            <a href="https://tailwindcss.com/" class="hover:underline">Produk</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
        <div class="text-center bg-primary py-8">
            <span class="text-white">Selamat berbelanja di PetsQu Shop</span>
        </div>
    <!-- Footer -->

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>