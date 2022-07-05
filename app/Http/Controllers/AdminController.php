<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        return view('back-end.produk.produk', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.produk.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|max:25',
            'harga' => 'required|integer|max:999999',
            'stock' => 'required|max:9999',
            'jenis' => 'required|max:10',
            'foto' => 'required|image',
            'keterangan' => 'max:100',
        ], [
            'nama_barang.required' => 'Nama barang tidak boleh kosong',
            'nama_barang.max' => 'Nama barang tidak boleh lebih dari 25 karakter',
            'harga.required' => 'Harga tidak boleh kosong',
            'harga.integer' => 'Harga harus angka',
            'harga.max' => 'Harga tidak boleh lebih dari Rp. 999999',
            'stock.required' => 'Stock tidak boleh kosong',
            'stock.max' => 'Stock tidak boleh lebih dari 9999',
            'jenis.required' => 'Jenis makanan hewan tidak boleh kosong',
            'jenis.max' => 'Jenis makanan hewan tidak boleh lebih dari 10 karakter',
            'foto.required' => 'Foto tidak boleh kosong',
            'foto.image' => 'Foto harus berbentuk format gambar',
            'keterangan.max' => 'Keterangan tidak boleh lebih dari 100 karakter',
        ]);

        $barang = new Barang([
            'nama_barang' => $request->nama_barang,
            'stock' => $request->stock,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
            'foto' => $request->foto,
            'keterangan' => $request->keterangan,
        ]);

        if ($request->hasFile('foto')) {
            $request->file('foto')->move('images', $request->file('foto')->getClientOriginalName());
            $barang->foto = $request->file('foto')->getClientOriginalName();
            $barang->save();
        }

        return redirect()->route('produks.index')->with('status', 'Data Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::find($id);
        return view('back-end.produk.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::find($id);
        return view('back-end.produk.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|max:25',
            'harga' => 'required|integer|max:999999',
            'stock' => 'required|max:9999',
            'jenis' => 'required|max:10',
            'foto' => 'required|image',
            'keterangan' => 'max:100',
        ], [
            'nama_barang.required' => 'Nama barang tidak boleh kosong',
            'nama_barang.max' => 'Nama barang tidak boleh lebih dari 25 karakter',
            'harga.required' => 'Harga tidak boleh kosong',
            'harga.integer' => 'Harga harus angka',
            'harga.max' => 'Harga tidak boleh lebih dari Rp. 999999',
            'stock.required' => 'Stock tidak boleh kosong',
            'stock.max' => 'Stock tidak boleh lebih dari 9999',
            'jenis.required' => 'Jenis makanan hewan tidak boleh kosong',
            'jenis.max' => 'Jenis makanan hewan tidak boleh lebih dari 10 karakter',
            'foto.required' => 'Foto tidak boleh kosong',
            'foto.image' => 'Foto harus berbentuk format gambar',
            'keterangan.max' => 'Keterangan tidak boleh lebih dari 100 karakter',
        ]);

        $barang = Barang::find($id);
        $barang->update ([
            'nama_barang' => $request->nama_barang,
            'stock' => $request->stock,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
            'foto' => $request->foto,
            'keterangan' => $request->keterangan,
        ]);

        if ($request->hasFile('foto')) {
            $request->file('foto')->move('images', $request->file('foto')->getClientOriginalName());
            $barang->foto = $request->file('foto')->getClientOriginalName();
            $barang->save();
        }

        return redirect()->route('produks.index')->with('status', 'Data Berhasil Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();

        return redirect()->route('produks.index')->with('status', 'Data Berhasil Dihapus!');
    }

    public function dashboard()
    {
        $user = User::all();
        $pesanan = Pesanan::all()->where('status', 'Belum Bayar');
        $barang = Barang::all();
        return view('back-end.dashboard', compact('barang', 'user', 'pesanan'));
    }

    public function userDelete($id)
    {
        $user = User::find($id);
        Auth::logout();
        if($user->delete()) {
            return Redirect::route('beranda.index')->with('status', 'Akun anda telah dihapus oleh admin!');
        }
        return redirect()->route('dashboard.index')->with('status', 'Data Berhasil Dihapus!');
    }

    public function pesanan()
    {
        $pesanan = Pesanan::all()->where('status', 'Belum Bayar');
        return view('back-end.pesanan.pesanan', compact('pesanan'));
    }
}
