<!DOCTYPE html>
<html lang="en" class="bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/5401602ad2.js" crossorigin="anonymous"></script>
    <title>PetsQu Shop Register</title>
</head>
<body>
    <div class="container flex flex-col items-center justify-center min-h-screen py-2">

        <!-- Validasi -->
            @error('name')
                <div class="alert alert-error shadow-lg m-5 w-full">
                    <div class="w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>{{ $message }}</span>
                        <div class="pl-[72%]">
                            <a href="{{ route('register') }}" data-dismiss="alert" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @enderror
            @error('email')
                <div class="alert alert-error shadow-lg m-5 w-full">
                    <div class="w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>{{ $message }}</span>
                        <div class="pl-[72%]">
                            <a href="{{ route('register') }}" data-dismiss="alert" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @enderror
            @error('password')
                <div class="alert alert-error shadow-lg m-5 w-full">
                    <div class="w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>{{ $message }}</span>
                        <div class="pl-[72%]">
                            <a href="{{ route('register') }}" data-dismiss="alert" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @enderror
        <!-- Validasi -->

        <div class="flex flex-col items-center justify-center w-full md:w-[85%] xl:w-[70%] flex-1 text-center">
            <div class="bg-white rounded-2xl shadow-2xl flex flex-col w-full max-w-full 
            sm:flex-col lg:flex-row ">
            
                <!-- Sign In Section --> 
                    <div class="p-5 w-full lg:w-3/4">

                        <!-- Logo --> 
                            <div class="text-left text-primary font-bold text-xl">
                                PetsQu Shop
                            </div>
                        <!-- Logo -->
                        
                        <!-- Form Section --> 
                            <div class="py-10">
                                <h2 class="text-3xl font-bold text-slate-700 mb-2">Sign Up Account</h2>
                                <div class="border-2 w-10 border-primary inline-block mb-2"></div>
                                <p class="text-slate-700 opacity-50 my-2">complete the following data</p>

                                <!-- Form --> 
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                        <div class="flex flex-col items-center py-5">
                                            <div class="bg-primary w-80 p-2 gap-2 flex items-center mb-3 rounded-full md:w-96 xl:w-96">
                                                <i class="fa-solid fa-user text-white m-2"></i>
                                                <input type="text" name="name" autocomplete="1" placeholder="Name" class="bg-primary outline-none text-sm flex-1 text-white" autofocus required>
                                            </div>
                                            <div class="bg-primary w-80 p-2 flex items-center mb-3 rounded-full md:w-96 xl:w-96">
                                                <i class="fa-solid fa-at text-white m-2"></i>
                                                <input type="email" name="email" autocomplete="1" placeholder="Email" class="bg-primary outline-none text-sm flex-1 text-white" autofocus>
                                            </div>
                                            <div class="bg-primary w-80 p-2 flex items-center mb-3 rounded-full md:w-96 xl:w-96">
                                                <i class="fa-solid fa-lock text-white m-2"></i>
                                                <input type="password" name="password" placeholder="Password" class="bg-primary outline-none text-sm flex-1 text-white">
                                            </div>
                                            <div class="bg-primary w-80 p-2 flex items-center mb-3 rounded-full md:w-96 xl:w-96">
                                                <i class="fa-solid fa-lock text-white m-2"></i>
                                                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="bg-primary outline-none text-sm flex-1 text-white">
                                            </div>
                                        </div>
                                    <!-- Form --> 

                                    <!-- Button --> 
                                        <button type="submit" class="border-2 border-primary rounded-full w-80 md:w-96 xl:w-[70%] px-12 py-2 inline-block font-semibold
                                        hover:bg-primary hover:text-white focus:outline-none focus:bg-primary focus:text-white">Sign Up</button>
                                    <!-- Button --> 

                                </form>
                            </div>
                        <!-- Form Section --> 
                    </div>
                <!-- Sign In Section -->

                <!-- Sign Up Section -->
                    <div class="p-5 w-full lg:w-2/4 bg-primary text-white rounded-bl-2xl rounded-br-2xl py-36 px-12 lg:rounded-tr-2xl lg:rounded-br-2xl lg:rounded-bl-none">
                        <h2 class="text-3xl font-bold mb-2">Welcome!</h2>
                        <div class="border-2 w-10 border-white inline-block mb-2"></div>
                        <p class="mb-10">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Provident, nostrum.</p>

                        <!-- Button --> 
                            <a href="{{ route('login') }}" class="border-2 border-white rounded-full px-12 py-2 inline-block font-semibold
                            hover:bg-white hover:text-primary focus:bg-white focus:outline-none focus:text-primary">Sign In</a>
                        <!-- Button --> 

                    </div>
                <!-- Sign Up Section -->

            </div>
        </div>
    </div>
</body>
</html>