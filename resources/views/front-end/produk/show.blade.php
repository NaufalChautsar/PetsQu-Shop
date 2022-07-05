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
                                        <a href="{{ route('produk.index') }}" class="text-primary font-semibold text-xl py-5 mx-10 flex justify-center
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
    <!-- Validasi -->
        @if (session('status'))
            <div class="alert alert-error shadow-lg absolute m-5 mt-24 w-[75%] mx-16 md:mx-28 lg:mt-28 xl:mx-52 laptop:mx-60">
                <div class="w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>{{ session('status') }}</span>
                </div>
            </div>
        @endif  
    <!-- Validasi -->

    <main class="h-[100%] py-32 lg:py-64 lg:h-screen">
        <a href="{{ route('produk.index') }}" class="text-dark hover:text-primary flex mx-8 lg:mx-[7%] md:mx-[24.5%] xl:mx-[9.5%] laptop:mx-[16.6%]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>
        <div class="flex flex-col-reverse lg:flex-row lg:justify-around laptop:px-40">
            <div class="flex flex-col w-96 mx-5 md:mx-52 lg:mx-0 lg:w-[40%] lg:px-10">
                <div class="max-w-md">
                    <div class="flex items-center text-sm pt-9 xl:pt-5">
                        <span class="text-dark opacity-50">Produk</span>  
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 m-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                        <span class="text-dark">Produk Detail</span>
                    </div>
                    <div class="pt-10 xl:pt-24">
                        <h1 class="text-4xl font-bold tracking-wide text-primary">{{ $barang->nama_barang }}</h1>
                    </div>
                    <div class="flex items-center justify-between pt-4">
                        <span class="text-2xl text-dark">Rp. {{ number_format($barang->harga, 0, ',','.') }}</span>
                        <div class="flex items-center pr-[11%] lg:pr-0">
                            <div class="pl-2 leading-none ">
                                <span class="text-primary text-lg">({{ $barang->stock }})</span> Items
                            </div>
                        </div>
                    </div>
                    <p class="pt-8 leading-relaxed">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci, animi?</p>
                    <form action="{{ route('pesan.store', $barang->id) }}" method="POST">
                        @csrf
                        <div class="flex flex-col pt-20 xl:flex-row xl:justify-between xl:pt-14">
                            <div class="flex justify-evenly items-center border rounded-lg border-primary xl:h-[9%] xl:mt-5 xl:w-48">
                                <div id="minus" class="p-4 hover:text-primary cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input name="jumlah_pesanan" id="jumlah" type="text" class="w-16 h-full text-center outline-none" value="">
                                <div id="plus" class="p-4 hover:text-primary cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <button type="submit" id="add" class="py-4 my-5 text-sm font-bold text-dark uppercase bg-white border border-primary rounded-lg px-14 hover:bg-primary hover:text-white hover:border-none focus:outline-none focus:bg-primary focus:text-white cursor-pointer">Add to cart</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="relative flex flex-col items-end w-96 mx-5 py-10 md:mx-48 lg:mx-12 lg:mt-10">
                <img src="{{ asset('images/'.$barang->foto) }}" alt="{{ $barang->nama_barang }}">
            </div>
        </div>
    </main>
@endsection