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
                        <a href="{{ route('dashboard.index') }}" class="flex gap-x-4 items-center py-2 text-gray-500 hover:text-primary group">
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
                        <a href="{{ route('pesanan.index') }}" class="flex gap-x-4 items-center py-2 text-primary hover:text-primary group">
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
                        <h1 class="text-2xl font-bold leading-relaxed text-gray-800">Pesanan</h1>
                        <p class="text-sm font-medium text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa, soluta.</p>
                    </div>
                </div>
            <!-- Header -->

            <div class="max-h-[70%] h-full">
                <h1 class="text-xl mb-2 py-4 px-6 font-semibold text-gray-800">Data Pesanan</h1>

                <!-- Table -->
                    <table class="w-full border-b border-gray-200">
                        <thead>
                            <tr class="text-sm font-medium text-gray-700 border border-gray-200 flex gap-x-10 md:gap-x-16 px-6 xl:gap-x-36 laptop:gap-x-60 md:px-8">
                                <td class="py-4 text-center">No</td>
                                <td class="py-4 text-center pl-[42px] md:px-8 md:pl-10">
                                    <div class="flex items-center">
                                        <span>Nama User</span>
                                    </div>
                                </td> 
                                <td class="py-4 px-4 text-center hide">Jumlah</td>
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
                                        <div class="font-medium text-gray-400 md:hidden">Rp. {{ number_format($item->total_harga, 0, ',','.') }}</div>
                                    </td>
                                    <td class="font-medium text-center md:py-7 md:pl-[9px] lg:pl-[5px] xl:pl-0 hide">{{ $item->jumlah_pesanan }} Item</td>
                                    <td class="font-medium text-center md:py-7 md:pl-3 xl:pl-2 hide">Rp. {{ $item->total_harga }}</td>
                                    <td class="pr-12 flex items-center">
                                        <span class="w-20 group-hover:hidden pl-10 md:py-7 md:pl-[29px] xl:pl-6">{{ $item->tanggal->format('d-m-Y') }}</span>
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
                <!-- Table -->
                
            </div>
        </main>
    <!-- Content -->
@endsection