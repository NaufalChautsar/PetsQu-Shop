@extends('appadmin')
@section('sidebar')
    <!-- Sidebar -->
        <aside class="py-6 px-6 nav-fixed lg:px-12 w-full border-r border-b-2 lg:border-b-0 border-gray-200 lg:w-60 xl:w-72">
            <!-- Logo -->
                <h1 class="font-bold text-dark text-2xl">PetsQu 
                    <span class="font-bold text-primary text-lg">Shop</span>
                </h1>
            <!-- Logo -->

            <!-- Menu -->
                <ul class="flex flex-row gap-y-6 justify-start gap-x-5 pt-10 lg:pt-16 lg:flex-col lg:gap-x-0 md:gap-x-20 md:justify-evenly">
                    <li>
                        <a href="{{ route('dashboard.index') }}" class="flex gap-x-4 items-center py-2 text-primary hover:text-primary group">
                            <span class="absolute w-1.5 h-8 bg-primary rounded-full left-0 scale-y-90 -translate-x-full group-hover:scale-y-90 lg:group-hover:translate-x-1 transition-transform ease-in-out"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            <span class="font-semibold text-lg">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('produks.index') }}" class="flex gap-x-4 items-center py-2 text-gray-500 hover:text-primary group">
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
    <!-- Content -->
        <main class="flex-1 pt-40 lg:pt-0">

            <!-- Header -->
                <div class="flex items-center justify-between gap-x-4 py-7 px-6 lg:px-7 lg:gap-x-0 xl:px-6">
                    <div>
                        <h1 class="text-2xl font-bold leading-relaxed text-gray-800">Dashboard</h1>
                        <p class="text-sm font-medium text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa, soluta.</p>
                    </div>
                </div>
            <!-- Header -->

            <div class="max-h-[70%] h-full">

                <!-- Card -->
                    <div class="flex flex-col px-5 py-3 md:grid md:grid-cols-2 xl:grid-cols-3 xl:px-6 laptop:gap-x-10">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="w-96 bg-white border-gray-300 border rounded-2xl flex mb-3 md:w-[97%] hover:bg-gray-100 hover:border-primary cursor-pointer">
                            <div class="w-32 laptop:w-40 flex items-center justify-center text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                            <div class="card-body mr-10 pl-2 md:mr-0 md:pl-0">
                                <h2 class="card-title font-bold">{{Auth::user()->name}}</h2>
                                <p>Click to logout</p>
                            </div>
                        </a>
                        <div class="w-96 bg-white border-gray-300 border rounded-2xl flex mb-3 md:w-[97%] hover:bg-gray-100 hover:border-primary cursor-pointer">
                            <div class="flex w-[31%] items-center justify-center text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div class="card-body mr-10 pl-2">
                                <h2 class="card-title font-semibold text-5xl">{{ $pesanan->count() }}
                                    <span class="text-dark text-sm font-bold pt-5 pl-2">Pesanan</span>
                                </h2>
                            </div>
                        </div>
                        <div class="w-96 bg-white border-gray-300 border rounded-2xl flex mb-3 md:w-[97%] hover:bg-gray-100 hover:border-primary cursor-pointer">
                            <div class="flex w-[31%] items-center justify-center text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <div class="card-body mr-10 pl-2">
                                <h2 class="card-title font-semibold text-5xl">{{ $barang->count() }}
                                    <span class="text-dark text-sm font-bold pt-5 pl-2">Produk</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                <!-- Card -->

                <h1 class="text-xl mb-2 py-4 px-6 font-semibold text-gray-800">Data Pesanan</h1>

                <!-- Table Pesanan-->
                    <table class="w-full border-b border-gray-200">
                        <thead>
                            <tr class="text-sm font-medium text-gray-700 border border-gray-200 flex gap-x-10 md:gap-x-16 px-6 xl:gap-x-36 laptop:gap-x-60 md:px-8">
                                <td class="py-4 text-center">No</td>
                                <td class="py-4 text-center pl-[42px] md:px-8 md:pl-10">
                                    <div class="flex items-center">
                                        <span>Nama User</span>
                                    </div>
                                </td> 
                                <td class="py-4 px-4 text-center hide">Total</td>
                                <td class="py-4 pl-[85px] md:pl-16 text-center xl:pl-[76px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                    </svg>
                                </td>
                            </tr>
                        </thead>
                        <tbody class="overflow-y-scroll h-[500px] grid grid-rows-auto">
                            @forelse ($pesanan as $item)
                                <tr class="transition-colors hover:bg-gray-100 group w-full flex px-6 gap-x-10 md:gap-x-14 h-40 py-10 text-center xl:px-6 xl:gap-x-36 laptop:gap-x-60 md:px-8 hover:cursor-pointer">
                                    <td class="py-7 text-center pl-2 xl:pl-4">1</td>
                                    <td class="flex flex-col items-center justify-center pl-9 md:pl-10 md:px-8 xl:pl-9">
                                        <span class="text-lg font-semibold text-gray-700">
                                            {{ $item->user->name }}
                                        </span>
                                        <div class="font-medium text-gray-400 md:hidden">Rp. {{ number_format($item->total_harga, 0, ',', '.') }}</div>
                                    </td>
                                    <td class="font-medium text-center md:py-7 md:pl-3 xl:pl-2 hide">Rp. {{ $item->total_harga }}</td>
                                    <td class="pr-12 flex items-center">
                                        <span class="w-20 group-hover:hidden pl-10 md:py-7 md:pl-[29px] xl:pl-6">{{ $item->created_at->format('d/m/y') }}</span>
                                        <div class="hidden group-hover:flex group-hover:items-center group-hover:w-20 group-hover:gap-x-2 pl-3 md:pl-1 xl:pl-0">
                                            <button class="mx-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 hover:text-white hover:rounded-md hover:bg-primary p-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                            <button class="mx-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 hover:text-white hover:rounded-md hover:bg-primary p-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                            <button class="mx-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 hover:text-white hover:rounded-md hover:bg-primary p-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>
                <!-- Table Pesanan-->

                 <!-- Table User-->
                    <table class="w-full border-b border-gray-200">
                        <thead class="w-full">
                            <tr class="text-sm font-medium text-gray-700 border border-gray-200 flex gap-x-10 md:gap-x-16 px-6 xl:gap-x-36 laptop:gap-x-60 md:px-8">
                                <td class="py-4 text-center">No</td>
                                <td class="py-4 text-center pl-10 md:px-8 md:pl-44 lg:pl-52 xl:pl-20">
                                    <div class="flex items-center">
                                        <span>Nama User</span>
                                    </div>
                                </td> 
                                <td class="py-4 px-4 text-center hide-field-table xl:pl-[10%]">Email</td>
                                <td class="py-4 pl-24 md:pl-48 text-center lg:pl-[22%] xl:pl-[14%]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                    </svg>
                                </td>
                            </tr>
                        </thead>
                        <tbody class="overflow-y-scroll h-[500px] grid grid-rows-auto">
                            @forelse ($user as $item)
                                <tr class="transition-colors hover:bg-gray-100 group w-full flex px-6 gap-x-10 md:gap-x-14 h-40 py-10 text-center xl:px-6 xl:gap-x-36 laptop:gap-x-60 md:px-8 hover:cursor-pointer">
                                    <td class="py-7 text-center pl-2 xl:pl-4">{{ $loop->iteration }}</td>
                                    <td class="flex flex-col items-center justify-center pl-4 md:pl-[16%] md:px-8 lg:pl-[21%] xl:pl-[5%] laptop:pl-[3.5%]">
                                        <span class="text-lg font-semibold text-gray-700">
                                            {{ $item->name }}
                                        </span>
                                        <div class="font-medium text-gray-400 hide xl:hidden">{{ $item->email }}</div>
                                    </td>
                                    <td class="font-medium text-center py-7 xl:pl-0 laptop:pl-[2.5%] hide-field-table">{{ $item->email }}</td>
                                    <td class="pr-12 flex items-center">
                                        <span class="w-20 pl-10 md:py-7 md:pl-[129%] lg:pl-[80%] xl:pl-[50%] laptop:pl-[140%]">{{ $item->created_at->format('d/m/y') }}</span>
                                        {{-- <div class="hidden group-hover:flex group-hover:items-center group-hover:w-20 group-hover:gap-x-2 pl-[70%] md:pl-[149%] lg:pl-[98%] xl:pl-[65%] laptop:pl-[156%]">
                                            <label for="modal-{{ $item->id }}" class="mx-1 cursor-pointer" data-target="modeal-{{ $item->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 hover:text-white hover:rounded-md hover:bg-primary p-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </label>
    
                                            <!-- Modal -->
                                                <input type="checkbox" id="modal-{{ $item->id }}" class="modal-toggle"/>
                                                <div class="modal bg-opacity-80 bg-white shadow-none">
                                                    <div class="modal-box bg-white border border-primary">
                                                        <form action="{{ route('user.destroy', $item->id) }}" method="POST">
                                                            @method('delete')
                                                            @csrf
                                                            <h3 class="font-bold text-lg text-dark text-center">Apakah anda yakin ingin menghapus data ini ?</h3>
                                                            <div class="modal-action flex justify-center items-center">
                                                                <a href="{{ route('dashboard.index') }}" class="btn text-white border-none w-20 bg-gray-600 hover:bg-gray-500">Tidak</a>
                                                                <button class="btn bg-red-600 border-none text-white hover:bg-red-500 hover:text-white">Delete Data</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            <!-- Modal -->
                                        </div>  --}}
                                    </td>
                                </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>
            <!-- Table User-->
            </div>
        </main>
    <!-- Content -->
@endsection