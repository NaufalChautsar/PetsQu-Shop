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
            <div class="alert alert-success shadow-lg absolute m-5 mt-28 w-[75%] mx-60">
                <div class="w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>{{ session('status') }}</span>
                    <div class="pl-[74%]">
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

    <div class="container py-32 md:py-40 xl:py-40">
        <div class="flex flex-col">
            <a href="{{ route('produk.index') }}" class="text-dark hover:text-primary flex mx-8 xl:mx-[60px]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
            <div class="flex items-center text-sm pt-5 mx-8 mb-9 lg:mx-8 xl:mx-[60px]">
                <span class="text-dark opacity-50">Beranda</span>  
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 m-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-dark">Keranjang</span>
            </div>
        </div>
        <div class="container items-start flex flex-col justify-around lg:flex-row xl:py-28">

            <!-- Table -->
                <div class="w-full lg:w-[60%] p-4 rounded">
                    <table class="w-full border-b border-gray-200">
                        <thead>
                            <tr class="text-sm font-medium text-gray-700 border border-gray-200">
                                <td class="pl-5">No</td>
                                <td class="pl-8 md:pl-0 lg:pl-10">
                                    <div class="flex justify-center items-center gap-x-4">
                                        <span>Produk Name</span>
                                    </div>
                                </td> 
                                <td class="py-4 px-4 text-center hide">Jumlah</td>
                                <td class="py-4 pl-[24%] md:pl-[12.3%] text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                    </svg>
                                </td>
                            </tr>
                        </thead>
                        <tbody class="cursor-pointer">
                            @forelse ($pesananDetail as $item)
                                <tr class="hove:bg-gray-100 transition-colors group">
                                    <td class="pl-6">{{$loop->iteration}}</td>
                                    <td class="flex justify-center items-center text-center py-8 pl-2 w-full">
                                        <img src="{{ asset('images/'.$item->barang->foto)}}" alt="{{$item->barang->nama_barang}}" class="hide aspect-square w-44 rounded-lg object-cover object-top border-gray-200">
                                        <div class="pl-5 lg:pl-2 xl:pl-5">
                                            <div class="text-lg font-semibold text-gray-700">
                                                {{$item->barang->nama_barang}}
                                            </div>
                                            <div class="font-medium text-gray-400 text-sm lg:w-16 xl:text-base xl:w-full">Makanan {{$item->barang->jenis}}</div>
                                            <div class="font-medium text-gray-400 text-sm md:hidden">{{$item->jumlah_pesanan}} Item</div>
                                        </div>
                                    </td>
                                    <td class="font-medium text-center hide">{{$item->jumlah_pesanan}} Item</td>
                                    <td class="pr-0">
                                        <span class="inline-block w-full group-hover:hidden pl-14 lg:pl-10 lg:pr-2 xl:pl-[70px]">Rp. {{number_format($item->total_harga, 0, ',','.')}}</span>
                                        <div class="hidden group-hover:flex group-hover:justify-center group-hover:w-[120px] mr-[17px] pl-[70px] lg:pl-[40px] xl:pl-[96px] md:pl-[70px] md:mr-[18px] lg:mr-[9px] xl:mr-[40px]">
                                            <label for="modal-{{ $item->id }}" class="mx-1 cursor-pointer" data-target="modeal-{{ $item->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 hover:text-white hover:rounded-md hover:bg-primary p-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </label>
    
                                            <!-- Modal -->
                                                <input type="checkbox" id="modal-{{ $item->id }}" class="modal-toggle"/>
                                                <div class="modal bg-opacity-80 bg-white shadow-none">
                                                    <div class="modal-box bg-white border border-primary">
                                                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                                            @method('delete')
                                                            @csrf
                                                            <h3 class="font-bold text-lg text-dark text-center">Apakah anda yakin ingin menghapus pes ini ?</h3>
                                                            <div class="modal-action flex justify-center items-center">
                                                                <a href="{{ route('cart.index') }}" class="btn text-white border-none w-20 bg-gray-600 hover:bg-gray-500">Tidak</a>
                                                                <button class="btn bg-red-600 border-none text-white hover:bg-red-500 hover:text-white">Delete Data</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            <!-- Modal -->
    
                                        </div>
                                    </td>
                                </tr>
                            @empty
    
                            @endforelse
                        </tbody>
                    </table>
                </div>
            <!-- Table -->
    
            <!-- Sidebar -->
                <div class="w-[93%] p-6 mx-4 mt-10 rounded-lg bg-gray-100 md:mt-0 md:w-[96%] md:p-16 lg:p-6 lg:w-[35%] xl:p-8 xl:w-[30%]">
                    <h4 class="text-dark text-lg mb-6 font-bold">Total Pesanan</h4>
                    @forelse ($pesananDetail as $item)
                        <form action="{{ route('checkOut.store', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf 
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <div>
                                        <h5 class="text-dark font-medium">{{ $item->barang->nama_barang }}</h5>
                                        <p class="text-gray-400 text-sm">Makanan {{ $item->barang->jenis }}</p>
                                    </div>
                                    <p class="text-gray-600">x{{ $item->jumlah_pesanan }}</p>
                                    <p class="text-dark">Rp. {{ number_format($item->total_harga, 0, ',','.') }}</p>
                                </div>
                            </div>
                            <div class="flex justify-between text-dark font-medium my-4">
                                <p class="pt-3">Kurir</p>
                                <select name="kurir" id="kurir" class="select bg-gray-100 active:border-none w-32 max-w-xs">
                                    <option disabled selected>Pilih Kurir</option>
                                    <option value="JNT">JNT</option>
                                    <option value="SiCepat">SiCepat</option>
                                </select>
                            </div>
                            <div class="flex justify-between text-dark font-medium my-8">
                                <p class="font-bold uppercase">Total</p>
                                <p class="font-bold text-xl md:text-2xl">Rp. {{ number_format($item->total_harga, 0, ',','.') }}</p>
                            </div>
                            <a>
                                <button type="submit" class="w-full rounded-xl p-3 my-3 text-center cursor-pointer uppercase bg-gray-100 border border-primary text-dark hover:border-none hover:text-white hover:bg-primary">
                                    Check Out
                                </button>
                            </a>
                        </form>
                    @empty
                            
                    @endforelse
                </div>
            <!-- Sidebar -->
    
        </div>
    </div>
@endsection