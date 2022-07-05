<!DOCTYPE html>
<html lang="en" class="bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/5401602ad2.js" crossorigin="anonymous"></script>
    <title>Admin Login</title>
</head>
<body>
    <div class="container flex flex-col items-center justify-center min-h-screen py-2">

        <!-- Validasi -->
           @if (session('status'))
                <div class="alert alert-error shadow-lg m-5 w-full">
                    <div class="w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>{{ session('status') }}</span>
                        <div class="pl-[63%]">
                            <a href="{{ route('login') }}" data-dismiss="alert" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
           @endif
        <!-- Validasi -->

        <div class="flex flex-col items-center justify-center w-full md:w-[80%] xl:w-[60%] laptop:w-[55%] flex-1 text-center lg:px-10">
            <div class="bg-white rounded-2xl shadow-2xl flex flex-col w-full max-w-full 
            sm:flex-col lg:flex-row">

                <!-- Sign In Section --> 
                    <div class="p-5 w-full lg:w-3/2">

                        <!-- Logo --> 
                            <div class="text-left text-primary font-bold text-xl">
                                PetsQu Shop
                            </div>
                        <!-- Logo --> 

                        <!-- Form Login--> 
                            <div class="py-10">
                                <h2 class="text-3xl font-bold text-slate-700 mb-2">Sign in to Account</h2>
                                <div class="border-2 w-10 border-primary inline-block mb-10"></div>
                                <!-- Form --> 
                                    <div class="flex flex-col items-center">
                                        <form action="" method="POST">
                                            @csrf
                                            <div class="bg-primary w-80 p-2 flex items-center mb-3 rounded-full">
                                                <i class="fa-solid fa-at text-white m-2"></i>
                                                <input type="email" name="email" autocomplete="1" placeholder="Email" class="bg-primary active:bg-primary selection:bg-primary focus:bg-primary outline-none text-sm flex-1 text-white @error('email') is-invalid @enderror" autofocus required>
                                            </div>
                                            <div class="bg-primary w-80 p-2 flex items-center mb-3 rounded-full">
                                                <i class="fa-solid fa-lock text-white m-2"></i>
                                                <input type="password" name="password" placeholder="Password" class="bg-primary outline-none text-sm flex-1 text-white" required>
                                            </div>
                                            <div class="flex justify-between w-72 mb-7 mt-2">
                                                <label for="" class="flex justify-center items-center text-xs">
                                                    <input type="checkbox" class="mr-1">
                                                        Remember me
                                                </label>
                                                <a href="#" class="text-xs">Forgot Password?</a>
                                            </div>
                                            <!-- Button --> 
                                                <button type="submit" class="border-2 border-primary rounded-full w-80 px-12 py-2 inline-block font-semibold
                                                hover:bg-primary hover:text-white">Sign In</button>
                                            <!-- Button --> 
                                        </form>
                                    </div>
                                <!-- Form --> 
                            </div>
                        <!-- Form Login --> 

                    </div>
                <!-- Sign In Section -->

            </div>
        </div>
    </div>
</body>
</html>