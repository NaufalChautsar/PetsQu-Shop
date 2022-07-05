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
                                        <a href="{{ route('beranda.index') }}" class="text-primary font-semibold text-xl py-5 mx-10 flex justify-center
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
            <div class="alert alert-success shadow-lg absolute m-5 mt-28 w-[90%] mx-28">
                <div class="w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>{{ session('status') }}</span>
                    <div class="pl-[73%]">
                        <a href="{{ route('beranda.index') }}" data-dismiss="alert" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    <!-- Status -->

    <!-- Hero Section -->
        <section id="landing-page" class="h-screen flex justify-center items-center bg-white">
            <div class="container">
                <div class="flex flex-wrap">
                    <div class="w-full px-4 flex flex-col items-center justify-center lg:w-1/2">
                        <h1 class="text-base font-semibold text-primary 
                        md:text-xl">Tempat Pet Shop Terbaik 
                        </h1>
                        <h1 class="font-bold text-dark text-4xl mb-5 lg:text-5xl">PetsQu Shop</h1>
                        <p class="font-medium text-slate-400 mb-8 text-center opacity-80 w-[80%]">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam veniam autem, reprehenderit incidunt minima pariatur.
                        </p>
                        <a href="{{ route('produk.index') }}" class="text-base font-semibold text-white bg-primary py-3 
                        px-8 mb-8 rounded-full hover:shadow-lg hover:bg-amber-700 transition 
                        duration-300 ease-in-out flex justify-around">Lihat Produk<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-3" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                          </svg></a>
                        <div class="flex flex-row justify-center items-center gap-10">
                            <a href="{{ asset('https://www.instagram.com/')}}">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="{{ asset('https://www.youtube.com/') }}">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                            <a href="{{ asset('https://web.facebook.com/') }}">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                        </div>
                    </div>
                    <div class="w-full self-end px-4 lg:w-1/2">
                        <div class="mt-10 lg:mt-9 lg:right-0">
                            <img width="500" height="500" src="{{ asset('https://st3.depositphotos.com/1177973/14011/i/950/depositphotos_140115380-stock-photo-group-of-cute-pets.jpg')}}" alt="PetsQu" 
                            class="max-w-full mx-auto" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Hero Section -->

    <!-- The Best Produk -->
        <section id="produk" class="h-[100%] py-36 bg-white">
            <div class="contaiter">

                <!-- Title --> 
                    <div class="flex flex-col justify-center items-center">
                        <h1 class="font-bold text-primary text-4xl mb-2">The Best Produk</h1>
                        <p class="text-center font-medium text-slate-400 opacity-80 mb-20">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam, pariatur!</p>
                    </div>
                <!-- Title -->

                <!-- Card -->
                    @forelse ($barang as $item)   
                        <div class="container md:flex md:flex-wrap lg:justify-evenly">
                            <div class="card w-96 bg-primary bg-opacity-10 shadow-sm mb-10 md:m-5 md:w-[45.5%] lg:w-96 md:h-min">
                                <figure><img src="{{ asset('images/'.$item->foto) }}" alt="Shoes" class="w-60 pt-8"/></figure>
                                <div class="card-body">
                                    <h2 class="card-title text-dark">{{ $item->nama_barang }}
                                        <div class="badge bg-primary border-none text-white p-3">Makanan {{ $item->jenis }}</div>
                                        <div class="badge bg-primary border-none text-white p-3">{{ $item->stock }} Item</div>
                                    </h2>
                                    <h2 class="text-dark text-sm">Rp. {{ number_format($item->harga, 0, ',','.')}}</h2>
                                    <h2 class="text-dark mb-2 opacity-50">{{ $item->keterangan }}</h2>
                                    <div class="card-actions">
                                        <a href="{{ route('produk.show', $item->id) }}" class="btn w-full bg-white border-primary text-primary hover:bg-primary hover:border-none hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            Lihat Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        
                    @endforelse
                <!-- Card -->    

        </section>
    <!-- The Best Produk -->
@endsection