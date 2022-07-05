<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function beranda()
    {
        $user = User::all();
        $barang = Barang::all();
        return view('front-end.beranda', compact('barang', 'user'));
    }

    public function produk()
    {
        $barang = Barang::all();
        return view('front-end.produk.produk', compact('barang'));
    }

    public function produkDetail($id)
    {
        $barang = Barang::find($id);
        return view('front-end.produk.show', compact('barang'));
    }

    public function pesan(Request $request, $id)
    {   
        // Validasi
        $request->validate([
            'jumlah_pesanan' => 'required',
        ],[
            'jumlah_pesanan.required' => 'Masukkan jumlah pesanan',
        ]);

        $barang = Barang::find($id)->first();
        $tanggal = Carbon::now()->format('Y-m-d');
        $total = $barang->harga * $request->jumlah_pesanan;
        // Validasi jumlah pesanan melebihi stock
        if($request->jumlah_pesanan > $barang->stock) {
            return redirect()->back()->with('status', 'Jumlah pesanan tidak boleh melebihi stock');
        }

        // User menambah pesanan
        $pesananTambah = Pesanan::where('user_id', Auth::user()->id)->where('status', 'Check Out')->first();

        // Simpan pesanan ke database pesanan
        if(!($request->jumlah_pesanan) == 0) {
            if(empty($pesananTambah)){
                $pesanan = new Pesanan([
                    'user_id' => Auth::user()->id,
                    'tanggal' => $tanggal,
                    'status' => 'Check Out',
                    'total_harga' => $total,
                ]);
                $pesanan->save();
            } else {
                $pesananUpdate = Pesanan::where('user_id', Auth::user()->id)->where('status', 'Check Out')->first();
                $pesananUpdate->update([
                    'total_harga' => $pesananUpdate->total_harga + $total,
                ]);
                $pesananUpdate->save();
            }
        } else {
            return redirect()->back()->with('status', 'Masukkan jumlah pesanan');
        }

        // Simpan pesanan ke database pesanan detail
        // Mencari pesanan id ketika user login dimana statusnya check out
        $newPesananId = Pesanan::where('user_id', Auth::user()->id)->where('status', 'Check Out')->first();
        $total = $barang->harga * $request->jumlah_pesanan;
        
        // User menambah pesanan
        $pesananDetailTambah = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $newPesananId->id)->first();

        if(!($request->jumlah_pesanan) == 0) {
            if(empty($pesananDetailTambah)) {
                // Menambah baru pesanan detail
                $pesananDetail = new PesananDetail([
                    'barang_id' => $barang->id,
                    'pesanan_id' => $newPesananId->id,
                    'jumlah_pesanan' => $request->jumlah_pesanan,
                    'total_harga'  => $total,
                ]);
                $pesananDetail->save();
            } else {
                // Mengupdate pesanan detail
                $pesananDetailUpdate = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $newPesananId->id)->first();
                $pesananDetailUpdate->update([
                    'jumlah_pesanan' => $pesananDetailUpdate->jumlah_pesanan + $request->jumlah_pesanan,
                    'total_harga' => $pesananDetailUpdate->total_harga + $total,
                ]);
                $pesananDetailUpdate->save();
            }
        } else {
            return redirect()->back()->with('status', 'Masukkan jumlah pesanan');
        }

        return redirect()->route('beranda.index')->with('status', 'Pesanan anda sudah masuk ke keranjang');
    }

    public function cart()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 'Check Out')->first();
        if(!empty($pesanan)) {
            $pesananDetail = PesananDetail::where('pesanan_id', $pesanan->id)->get();
            return view('front-end.cart.cart', compact('pesanan', 'pesananDetail'));
        }
    }

    public function cartDelete($id)
    {
        // Mencari pesanan detail id
        $pesananDetail = PesananDetail::where('id', $id)->first();
        // Mencari pesanan dengan id yang sama dengan pesanan detail
        $pesanan = Pesanan::where('id', $pesananDetail->pesanan_id)->first();

        $pesananDetail->delete();

        // Mencari pesanan detail id yang sama pesanan id
        $pesananId = Pesanan::where('user_id', Auth::user()->id)->where('status', 'Check Out')->first();
        $pesananDetailId = PesananDetail::where('pesanan_id', $pesananId->id)->first(); 

        if(empty($pesananDetailId)) {
            $pesanan->delete();
            return redirect()->route('beranda.index')->with('status', 'Keranjang Anda Kosong!, Silahkan Lakukan Pemesanan');
        } else {
            // Mengupdate pesanan jumlah harga
            $total  = $pesanan->jumlah_harga - $pesananDetail->jumlah_harga;
            $pesanan->update([
                'jumlah_harga' => $total,
            ]);
            $pesanan->save();

            return redirect()->back()->with('status', 'Pesanan Berhasil Dihapus!');
        }

    }

    public function profile()
    {
        $user = User::find(Auth::user()->id)->first();
        return view('front-end.profile.profile', compact('user'));
    }

    public function profileUpdate(Request $request, $id)
    {
        $request->validate([
            'nohp' => 'required|max:13',
            'alamat' => 'required|max:100'
        ], [
            'nohp.required' => 'No Handphone tidak boleh kosong',
            'nohp.max' => 'No Handphone tidak boleh lebih dari 13 angka',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'alamat.max' => 'Alamat tidak boleh lebih dari 100 karakter',
        ]);

        $user = User::find($id);
        $user->update([
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
        ]);
        $user->save();

        return redirect()->back()->with('status', 'Profile Berhasil Diperbaharui!');
    }

    public function checkOut(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        if(empty($user->alamat) || empty($user->nohp)){
            return redirect()->back()->with('status', 'Lengkapi Profile Anda Terlebih Dahulu!');
        } 

        $pesananUpdate = Pesanan::where('user_id', Auth::user()->id)->where('status', 'Check Out')->first();
        $pesananUpdate->update([
            'status' => 'Belum Bayar',
            'kurir' => $request->kurir,
        ]);
        $pesananUpdate->save();
        
        $pesananDetail = PesananDetail::where('pesanan_id', $pesananUpdate->id)->get();
        foreach ($pesananDetail as $pesananDetail) {
            $barang = Barang::where('id', $pesananDetail->barang->id)->first();
            $barang->update([
                'stock' => $barang->stock - $pesananDetail->jumlah_pesanan,
            ]);
            $barang->save();
        }

        return redirect()->route('beranda.index')->with('status', 'Pesanan Berhasil Di Check Out');
    }
}
