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
    <!-- The Best Produk -->
        <section id="produk" class="h-[100%] py-36 bg-white">
            <div class="contaiter">
                <div class="container flex flex-col justify-center items-center md:items-start md:pl-10">
                    <h1 class="font-bold text-gray-700 text-4xl mb-2">Our Products</h1>
                    <p class="text-center font-medium text-slate-400 opacity-80 mb-20 md:text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam, pariatur!</p>
                </div>

            <!-- Card -->
                @forelse ($barang as $item)
                    <div class="container md:flex md:flex-wrap lg:justify-evenly">    
                        <div class="card w-96 bg-primary bg-opacity-10 shadow-sm mb-10 md:m-5 md:w-[45.5%] lg:w-96 md:h-min">
                            <figure>
                                <img src="{{ asset('images/'.$item->foto)}}" alt="Shoes" class="w-60 pt-8"/>
                            </figure>
                            <div class="card-body">
                                <h2 class="card-title text-dark">{{ $item->nama_barang }}
                                    <div class="badge bg-primary border-none text-white p-3">Makanan {{ $item->jenis }}</div>
                                    <div class="badge bg-primary border-none text-white p-3">{{ $item->stock }} Item</div>
                                </h2>
                                <h2 class="text-dark text-sm">Rp. {{ number_format($item->harga, 0, ',','.') }}</h2>
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