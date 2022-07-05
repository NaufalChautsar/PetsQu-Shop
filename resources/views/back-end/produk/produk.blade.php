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
    <!-- Content -->
        <main class="w-full pb-8 pt-40 lg:pt-0">
            @if (session('status'))
                <div class="alert alert-success shadow-lg m-5 w-[97.7%]">
                    <div class="w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>{{ session('status') }}</span>
                        <div class="pl-[84.5%]">
                            <a href="{{ route('produks.index') }}" data-dismiss="alert" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Header -->
                <div class="flex items-center justify-between gap-x-4 py-7 px-6 lg:px-12 lg:gap-x-0 xl:px-16">
                    <div>
                        <h1 class="text-2xl font-bold leading-relaxed text-gray-800">Produk</h1>
                        <p class="text-sm font-medium text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa, soluta.</p>
                    </div>
                    <a href="{{ route('produks.create')}}" class="flex justify-evenly items-center gap-x-2 py-2.5 px-6 lg:px-2 text-dark bg-white border-2 border-dark rounded-xl hover:bg-primary focus:ring-2 focus:hover:text-white hover:border-primary focus:outline-none focus:ring-primary focus:ring-offset-1 focus:border-none hover:text-white focus:text-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="hidden text-sm font-semibold tracking-wide md:flex">Tambah Produk</span>
                    </a>
                </div>
            <!-- Header -->

            <!-- Table -->
                <table class="w-full border-b border-gray-200">
                    <thead>
                        <tr class="text-sm font-medium text-gray-700 border border-gray-200">
                            <td class="pl-5">No</td>
                            <td class="pl-8 ">
                                <div class="flex items-center gap-x-4 md:pl-32">
                                    <span>Produk Name</span>
                                </div>
                            </td> 
                            <td class="py-4 px-4 text-center hide">Stock</td>
                            <td class="py-4 px-4 text-center hide">Harga</td>
                            <td class="py-4 pr-12 pl-16 md:pl-14 md:pr-10 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                </svg>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($barang as $item)
                            <tr class="hove:bg-gray-100 transition-colors group cursor-pointer">
                                <td class="pl-6">{{$loop->iteration}}</td>
                                <td class="flex items-center py-8 pl-5">
                                    <img src="{{ asset('images/'.$item->foto)}}" alt="{{$item->nama_barang}}" class="aspect-square w-44 rounded-lg object-cover object-top border-gray-200">
                                    <div class="pl-5 hide">
                                        <a href ="#" class="text-lg font-semibold text-gray-700">
                                            {{$item->nama_barang}}
                                        </a>
                                        <div class="font-medium text-gray-400">{{$item->jenis}}</div>
                                    </div>
                                </td>
                                <td class="font-medium text-center hide">{{$item->stock}} Item</td>
                                <td class="font-medium text-center hide">Rp. {{number_format($item->harga, 0, ',','.')}}</td>
                                <td class="pr-12">
                                    <span class="inline-block w-20 group-hover:hidden pl-8">{{$item->created_at->format('d/m/y')}}</span>
                                    <div class="hidden group-hover:flex group-hover:items-center group-hover:w-20 group-hover:gap-x-2 pl-2 md:pl-0">
                                        <a href="{{ route('produks.edit', $item->id) }}" class="mx-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 hover:text-white hover:rounded-md hover:bg-primary p-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <label for="modal-{{ $item->id }}" class="mx-1 cursor-pointer" data-target="modeal-{{ $item->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 hover:text-white hover:rounded-md hover:bg-primary p-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </label>

                                        <!-- Modal -->
                                            <input type="checkbox" id="modal-{{ $item->id }}" class="modal-toggle"/>
                                            <div class="modal bg-opacity-80 bg-white shadow-none">
                                                <div class="modal-box bg-white border border-primary">
                                                    <form action="{{ route('produks.destroy', $item->id) }}" method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <h3 class="font-bold text-lg text-dark text-center">Apakah anda yakin ingin menghapus data ini ?</h3>
                                                        <div class="modal-action flex justify-center items-center">
                                                            <a href="{{ route('produks.index') }}" class="btn text-white border-none w-20 bg-gray-600 hover:bg-gray-500">Tidak</a>
                                                            <button class="btn bg-red-600 border-none text-white hover:bg-red-500 hover:text-white">Delete Data</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        <!-- Modal -->

                                        <a href="{{ route('produks.show', $item->id) }}" class="mx-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 hover:text-white hover:rounded-md hover:bg-primary p-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            <!-- Table -->
            
            <!-- Pagination -->
                @if (!empty($barang))   
                    <div class="flex gap-x-2 justify-center pt-8">
                        <button class="flex justify-center items-center w-8 h-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 to-gray-800 stroke-current hover:text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <!-- Number -->
                            <button class="flex items-center justify-center w-8 h-8 font-medium rounded-full bg-primary text-white">1</button>
                            <button class="flex items-center justify-center w-8 h-8 font-medium rounded-full hover:text-primary">2</button>
                            <button class="flex items-center justify-center w-8 h-8 font-medium rounded-full hover:text-primary">3</button>
                            <button class="flex items-center justify-center w-8 h-8 font-medium rounded-full hover:text-primary">4</button>
                            <button class="flex items-center justify-center w-8 h-8 font-medium rounded-full hover:text-primary">5</button>
                            <button class="flex items-center justify-center w-8 h-8 font-medium rounded-full hover:text-primary">6</button>
                        <!-- Number -->
                        <button class="flex justify-center items-center w-8 h-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 to-gray-800 stroke-current hover:text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                @else

                @endif
            <!-- Pagination -->

        </main>
    <!-- Content -->
@endsection
