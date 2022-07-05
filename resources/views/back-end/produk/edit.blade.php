@extends('appadmin')
@section('sidebar')
    <!-- Sidebar -->
        <aside class="py-6 px-6 nav-fixed lg:px-12 w-full border-r border-b-2 lg:border-b-0 border-gray-200 lg:w-60">
            
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
                        <a href="{{ route('produks.index') }}" class="flex gap-x-4 items-center py-2 text-primary hover:text-primary group">
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
        <main class="flex-1 pb-8 pt-40 lg:pt-0">

            <!-- Header -->
                <div class="flex items-center justify-between gap-x-4 py-7 px-6 lg:px-12 lg:gap-x-0 xl:px-14">
                    <div>
                        <h1 class="text-2xl font-bold leading-relaxed text-gray-800">Ubah Produk</h1>
                        <p class="flex text-sm font-medium">
                            <span class="text-gray-400">Produk</span> 
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 m-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg> 
                            <span>Ubah Produk</span>
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

            <!-- Form -->
            <div class="px-5 md:w-[100%] lg:px-8 xl:px-9 laptop:px-10">
                <div class="card w-96 bg-white md:w-[100%]">
                    <div class="card-body px-3">
                        <form action="{{ route('produks.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="md:flex md:gap-x-10">
                                <div class="form-control w-full">
                                    <label class="label">
                                      <span class="label-text text-dark text-sm font-semibold">Nama Produk</span>
                                    </label>
                                    <input type="text" name="nama_barang" placeholder="Royal Canin" class="input input-bordered w-full bg-white border-gray-300 focus:border-none focus:ring-2 focus:ring-primary placeholder:text-dark placeholder:text-sm placeholder:opacity-50" value="{{ old('nama_barang', $barang->nama_barang) }}" />
                                    @error('nama_barang')
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
                                      <span class="label-text text-dark text-sm font-semibold">Stock</span>
                                    </label>
                                    <input type="text" name="stock" placeholder="0" class="input input-bordered w-full bg-white border-gray-300 focus:border-none focus:ring-2 focus:ring-primary placeholder:text-dark placeholder:text-sm placeholder:opacity-50" value="{{ old('stock', $barang->stock) }}" />
                                    @error('stock')
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
                            </div>
                            <div class="md:flex md:gap-x-10">
                                <div class="form-control w-full">
                                    <label class="label">
                                      <span class="label-text text-dark text-sm font-semibold">Jenis Makanan Hewan</span>
                                    </label>
                                    <select name="jenis" class="select select-bordered w-full bg-white border-gray-300 focus:border-none focus:ring-2 focus:ring-primary placeholder:text-dark text-opacity-50">
                                        <option value="Kucing" @if ($barang->jenis == 'Kucing') selected @endif>Kucing</option>
                                        <option value="Anjing" @if ($barang->jenis == 'Anjing') selected @endif>Anjing</option>
                                    </select>
                                    @error('jenis')
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
                                      <span class="label-text text-dark text-sm font-semibold">Harga</span>
                                    </label>
                                    <input type="text" name="harga" placeholder="15.000" class="input input-bordered w-full bg-white border-gray-300 focus:border-none focus:ring-2 focus:ring-primary placeholder:text-dark placeholder:text-sm placeholder:opacity-50" value="{{ old('harga', $barang->harga) }}"/>
                                    @error('harga')
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
                            </div>
                            <div class="form-control w-full pt-5">
                                <div class="w-full px-0">
                                    <div class="relative group w-full h-48 flex items-center justify-center">
                                        <div aria-hidden="true" class="absolute w-full h-full rounded-xl border border-gray-300 bg-white shadow-3xl group-hover:bg-gray-200 group-hover:bg-opacity-60 transition group-hover:border-none">
                                            <input type="file" name="foto" class="relative z-10 opacity-0 w-full h-full cursor-pointer" value="{{ old('foto', $barang->foto) }}">
                                            <div class="absolute inset-0 w-full h-full flex items-center justify-center">
                                                <div class="space-y">
                                                    <p class="text-gray-700 text-lg text-center">
                                                        <span class="block">Upload file kamu disini</span>
                                                        <label class="text-primary">Klik untuk upload</label>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @error('foto')
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
                                  <span class="label-text text-dark text-sm font-semibold">Keterangan</span>
                                </label>
                                <textarea class="textarea textarea-bordered h-32 w-full bg-white border-gray-300 focus:border-none focus:ring-2 focus:ring-primary placeholder:text-dark placeholder:text-sm placeholder:opacity-50" placeholder="Lorem ipsum dolor sit amet.">{{ old('keterangan', $barang->keterangan) }}</textarea>
                                @error('keterangan')
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
                            <div class="form-control w-60 float-right my-8">
                                <button type="submit" class="btn text-dark bg-white border border-dark hover:bg-primary hover:text-white hover:border-none focus:outline-none focus:ring-1 focus:ring-primary focus:bg-primary focus:text-white">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Form -->

        </main>
    <!-- Content -->
@endsection