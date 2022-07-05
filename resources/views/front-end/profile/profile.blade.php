@extends('app')
@section('navbar')
    <!-- Navbar -->
        <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
            <div class="container">
                <div class="flex items-center justify-between relative">

                    <!-- Logo -->
                        <div class="px-4">
                            <a href="{{ route('beranda.index') }}" class="font-bold text-2xl text-primary block py-6">
                                PetsQu Shop
                            </a>
                        </div>
                    <!-- Logo -->

                    <div class="flex items-center px-4">

                        <!-- Menu Hamburger Mobile -->
                            <button id="menu" name="name" type="button" 
                            class="block absolute right-4 lg:hidden">
                                <span class="menu-hamburger transition duration-300 
                                ease-in-out origin-top-left"></span>
                                <span class="menu-hamburger transition duration-300 
                                ease-in-out"></span>
                                <span class="menu-hamburger transition duration-300 
                                ease-in-out origin-bottom-left"></span>
                            </button>
                        <!-- Menu Hamburger Mobile -->

                        <!-- Navbar -->
                            <nav id="nav-menu" class="hidden absolute py-5 bg-white shadow-lg 
                            rounded-lg max-w-full w-[92%] md:w-[96%] max-h-screen h-screen right-4 top-full 
                            lg:h-auto lg:block lg:static lg:bg-transparent lg:max-w-full lg:w-full lg:shadow-none lg:rounded-none">
                                <ul class="block mt-8 lg:flex lg:mt-0">
                                    <li class="group">
                                        <a href="{{ route('beranda.index') }}" class="text-dark font-semibold text-xl py-5 mx-10 flex justify-center
                                        group-hover:text-primary lg:text-base lg:mx-8">Beranda</a>
                                    </li>
                                    <li class="group">
                                        <a href="{{ route('produk.index') }}" class="text-dark font-semibold text-xl py-5 mx-10 flex justify-center
                                        group-hover:text-primary lg:text-base lg:mx-8">Produk</a>
                                    </li>
                                    @if (Route::has('login'))
                                        @auth
                                            <li class="group">
                                                <a href="{{ route('produk.index') }}" class="text-dark font-semibold text-xl py-5 mx-10 flex justify-center
                                                group-hover:text-primary lg:text-base lg:mx-8">Riwayat Pesanan</a>
                                            </li>
                                            <li class="group">
                                                <!-- Count pesanan -->
                                                    @php
                                                        $pesanan = \App\Models\Pesanan::where('user_id', Auth::user()->id)->where('status', 'Check Out')->first();
                                                        if($pesanan == null) {
                                                            $pesananTotal = 0;
                                                        } else {
                                                            $pesananTotal = \App\Models\PesananDetail::where('pesanan_id', $pesanan->id)->count();
                                                        }
                                                    @endphp
                                                <!-- Count pesanan -->
                                                @if ($pesananTotal == 0)
                                                    <a href="{{ route('produk.index') }}" class="text-dark text-xl py-2 lg:mx-0 lg:mr-2 xl:mx-10 xl:mr-2 flex justify-center lg:text-base">
                                                        <span class="bg-primary hover:bg-amber-700 py-3 pl-5 rounded-full text-white">
                                                            <div class="indicator">
                                                                @if ($pesananTotal == 0)
                                                                    <span class="indicator-item indicator-start badge bg-gray-400 border-none text-dark">0</span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-5 mt-[5px] lg:mt-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                                    </svg>
                                                                @else
                                                                    <span class="indicator-item indicator-start badge bg-gray-400 border-none text-dark">{{ $pesananTotal }}</span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-5 mt-[5px] lg:mt-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                                    </svg>
                                                                @endif
                                                            </div>
                                                        </span>
                                                    </a>
                                                @else    
                                                    <a href="{{ route('cart.index') }}" class="text-dark text-xl py-2 lg:mx-0 lg:mr-2 xl:mx-10 xl:mr-2 flex justify-center lg:text-base">
                                                        <span class="bg-primary hover:bg-amber-700 py-3 pl-5 rounded-full text-white">
                                                            <div class="indicator">
                                                                @if ($pesananTotal == 0)
                                                                    <span class="indicator-item indicator-start badge bg-gray-400 border-none text-dark">{{ $pesananTotal}}</span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-5 mt-[5px] lg:mt-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                                    </svg>
                                                                @else
                                                                    <span class="indicator-item indicator-start badge bg-gray-400 border-none text-dark">{{ $pesananTotal }}</span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-5 mt-[5px] lg:mt-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                                    </svg>
                                                                @endif
                                                            </div>
                                                        </span>
                                                    </a>
                                                @endif
                                            </li>
                                            <li class="group">
                                                <a href="{{ route('profile.index') }}" class="text-dark text-xl py-2 mx-[16%] md:mx-[32.5%] lg:mx-0 xl:mx-10 xl:mr-2 flex justify-center items-center lg:text-base">
                                                    <span class="bg-primary w-60 lg:w-auto text-center hover:bg-amber-700 py-[9%] px-6 rounded-full text-white">
                                                        {{ Auth::user()->name }}
                                                    </span>
                                                </a>
                                            </li>
                                        @else 
                                            <li class="group">
                                                <a href="{{ route('login') }}" class="text-dark text-xl py-2 mx-10 flex justify-center lg:text-base lg:mr-8">
                                                    <span class="bg-primary hover:bg-amber-700 py-3 px-6 
                                                    rounded-full text-white">Sign In</span>
                                                </a>
                                            </li>
                                        @endauth
                                    @endif
                                </ul>
                            </nav>
                        <!-- Navbar -->

                    </div>
                </div>
            </div>
        </header>
    <!-- Navbar -->
@endsection
@section('content')
       <!-- Status -->
            @if (session('status'))
                <div class="alert alert-success shadow-lg absolute m-5 mt-24 w-[78%] mx-52">
                    <div class="w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>{{ session('status') }}</span>
                        <div class="pl-[80%]">
                            <a href="{{ route('profile.index') }}" data-dismiss="alert" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        <!-- Status -->

        <div class="container py-32 md:py-40 xl:py-40">
            <!-- Button Back -->
                <div class="flex flex-col">
                    <a href="{{ route('beranda.index') }}" class="text-dark hover:text-primary flex mx-5 xl:mx-[17px]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali
                    </a>
                    <div class="flex items-center text-sm pt-5 mx-5 mb-9 lg:mx-[20px] xl:mx-[17px]">
                        <span class="text-dark opacity-50">Beranda</span>  
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 m-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                        <span class="text-dark">Profile</span>
                    </div>
                </div>
            <!-- Button Back -->

            
            <div class="flex flex-col lg:flex-row xl:py-[2%]">

                <!-- Sidebar -->
                    <div class="w-[90%] mx-4 flex flex-col border border-gray-200 rounded-xl md:w-[95.5%] lg:w-[40%] lg:h-[150px]">
                        <div class="px-4 py-3 flex flex-row items-center justify-between lg:flex-col lg:items-start md:px-6">
                            <div class="flex gap-4 lg:border-b lg:pb-5 lg:border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div class="flex-grow">
                                    <p class="text-gray-600">Hello, </p>
                                    <h4 class="text-dark font-medium">{{ Auth::user()->name }}</h4>
                                </div>
                            </div>
                            <div class="pt-0 lg:pt-5 lg:px-2">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="flex text-dark uppercase hover:text-primary transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Keluar
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                <!-- Sidebar -->

                <!-- Form -->
                    <div class="w-[90%] mx-4 flex flex-col border border-gray-200 rounded-xl my-5 p-4 md:w-[95.5%] lg:my-0">   
                        <form action="{{ route('profile.store', $user->id) }}" method="POST">
                            @csrf
                            <div class="form-control w-full">
                                <label class="label">
                                    <span class="label-text text-dark text-sm font-semibold">Nama</span>
                                </label>
                                <input disabled type="text" name="name" placeholder="Royal Canin" class="input input-bordered w-full disabled:bg-gray-200 disabled:text-dark bg-white border-gray-300 focus:border-none focus:ring-2 focus:ring-primary placeholder:text-dark placeholder:text-sm placeholder:opacity-50" value="{{ old('name', $user->name) }}" />
                            </div>
                            <div class="form-control w-full">
                                <label class="label">
                                <span class="label-text text-dark text-sm font-semibold">Email</span>
                                </label>
                                <input disabled type="email" name="email" placeholder="Royal Canin" class="input input-bordered w-full disabled:bg-gray-200 disabled:text-dark bg-white border-gray-300 focus:border-none focus:ring-2 focus:ring-primary placeholder:text-dark placeholder:text-sm placeholder:opacity-50" value="{{ old('email', $user->email) }}" />
                            </div>
                            <div class="form-control w-full">
                                <label class="label">
                                    <span class="label-text text-dark text-sm font-semibold">No Handphone</span>
                                </label>
                                <input type="text" autocomplete="1" name="nohp" placeholder="081XXXX" class="input input-bordered w-full text-dark bg-white border-gray-300 focus:border-none focus:ring-2 focus:ring-primary placeholder:text-dark placeholder:text-sm placeholder:opacity-50" value="{{ old('nohp', $user->nohp) }}"/>
                                @error('nohp')
                                    <label class="label">
                                        <span class="label-text-alt text-red-500 flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            {{$message}}
                                        </span>
                                    </label>
                                @enderror
                            </div>
                            <div class="form-control w-full">
                                <label class="label">
                                    <span class="label-text text-dark text-sm font-semibold">Alamat</span>
                                </label>
                                <textarea name="alamat" autocomplete="1" class="textarea textarea-bordered h-32 w-full text-dark bg-white border-gray-300 focus:border-none focus:ring-2 focus:ring-primary placeholder:text-dark placeholder:text-sm placeholder:opacity-50" placeholder="Lorem ipsum dolor sit amet.">{{ old('alamat', $user->alamat) }}</textarea>
                                @error('alamat')
                                    <label class="label">
                                        <span class="label-text-alt text-red-500 flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            {{$message}}
                                        </span>
                                    </label>
                                @enderror
                            </div>
                            <div class="form-control w-60 float-right my-6">
                                <button type="submit" class="btn text-dark bg-white border border-dark hover:bg-primary hover:text-white hover:border-none focus:outline-none focus:ring-1 focus:ring-primary focus:bg-primary focus:text-white">Simpan</button>
                            </div>
                        </form>  
                    </div>
                <!-- Form -->
            </div>
        </div>
@endsection