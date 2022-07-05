@extends('appadmin')
@section('sidebar')
    <!-- Sidebar -->
        <aside class="py-6 px-6 nav-fixed lg:px-12 w-full border-r border-b-2 lg:border-b-0 border-gray-200 lg:w-60 laptop:w-72 xl:w-72">

            <!-- Logo -->
                <h1 class="font-bold text-dark text-2xl">PetsQu 
                    <span class="font-bold text-primary text-lg">Shop</span>
                </h1>
            <!-- Logo -->

            <!-- Menu -->
                <ul class="flex flex-row gap-y-6 justify-start gap-x-5 pt-10 lg:pt-16 lg:flex-col lg:gap-x-0 md:gap-x-20 md:justify-evenly">
                    <li>
                        <a href="{{ route('dashboard.index') }}" class="flex gap-x-4 items-center py-2 text-gray-500 hover:text-primary group">
                            <span class="absolute w-1.5 h-8 bg-primary rounded-full left-0 scale-y-90 -translate-x-full group-hover:scale-y-90 lg:group-hover:translate-x-1 transition-transform ease-in-out"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            <span class="font-semibold text-lg">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('produk.index') }}" class="flex gap-x-4 items-center py-2 text-primary hover:text-primary group">
                            <span class="absolute w-1.5 h-8 bg-primary rounded-full left-0 scale-y-90 -translate-x-full group-hover:scale-y-90 lg:group-hover:translate-x-1 transition-transform ease-in-out"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                            <span class="font-semibold text-lg">Produk</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pesanan.index') }}" class="flex gap-x-4 items-center py-2 text-gray-500 hover:text-primary group">
                            <span class="absolute w-1.5 h-8 bg-primary rounded-full left-0 scale-y-90 -translate-x-full group-hover:scale-y-90 lg:group-hover:translate-x-1 transition-transform ease-in-out"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            <span class="font-semibold text-lg">Pesanan</span>
                        </a>
                    </li>
                </ul>
            <!-- Menu -->

        </aside>
    <!-- Sidebar -->
@endsection
@section('content')
    <main class="w-full pb-8 pt-40 lg:pt-0">
        
        <!-- Header -->
            <div class="flex items-center justify-between gap-x-4 py-7 px-6 lg:px-12 lg:gap-x-0 xl:px-14">
                <div>
                    <h1 class="text-2xl font-bold leading-relaxed text-gray-800">Detail Produk</h1>
                    <p class="flex text-sm font-medium">
                        <span class="text-gray-400">Produk</span> 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 m-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg> 
                        <span>Detail Produk</span>
                    </p>
                </div>
                <a href="{{ route('produks.index')}}" class="flex justify-evenly items-center gap-x-2 py-2.5 px-6 lg:px-2 text-dark bg-white border-2 border-dark rounded-xl hover:bg-primary focus:ring-2 focus:hover:text-white hover:border-primary focus:outline-none focus:ring-primary focus:ring-offset-1 focus:border-none hover:text-white focus:text-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span class="hidden text-sm font-semibold tracking-wide md:flex">Kembali</span>
                </a>
            </div>
        <!-- Header -->

        <!-- Card -->
            <div class="container md:flex md:justify-center md:items-center my-10">
                <div class="card w-96 bg-primary bg-opacity-10 shadow-sm mb-10 md:m-5 md:w-80 lg:w-96 md:h-min">
                    <figure><img src="{{ asset('images/'.$barang->foto)}}" alt="Shoes" class="w-60 pt-8"/></figure>
                    <div class="card-body">
                        <h2 class="card-title text-dark">{{ $barang->nama_barang }}
                            <div class="badge bg-primary border-none text-white p-3">Makanan {{ $barang->jenis }}</div>
                        </h2>
                        <h2 class="text-dark text-sm">Rp. {{ number_format($barang->harga, 0, ',','.') }}</h2>
                        <h2 class="text-dark mb-2 opacity-50">{{ $barang->keterangan }}</h2>
                        <div class="card-actions justify-end">
                            <button disabled type="submit" class="btn w-[79.3%] bg-white border-primary text-primary hover:bg-primary hover:border-none hover:text-white md:w-[73.9%] lg:w-[79%]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Add to cart
                            </button>
                            <button disabled class="btn bg-white text-primary border-primary hover:bg-primary hover:text-white hover:border-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Card -->

    </main>
@endsection