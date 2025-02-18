<?php

namespace App\Http\Controllers;

use App\Models\detailpenjualan;
use App\Models\penjualan;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class detailpenjualanController extends Controller
{
    public function index(): View
    {
        $detailPenjualans = detailpenjualan::latest()->paginate(5);
        return view('detailpenjualans.index', compact('detailPenjualans'));
    }

    public function create()
    {
        $penjualans = penjualan::all();
        $produks = produk::all();
    
        // Mengambil ID Detail terakhir
        $lastDetail = detailpenjualan::latest('iddetail')->first();
        $newIdDetail = $lastDetail ? (int) substr($lastDetail->iddetail, -3) + 1 : 1;
        $newIdDetail = str_pad($newIdDetail, 3, '0', STR_PAD_LEFT); // Menambahkan padding jika ID lebih kecil dari 3 digit
    
        return view('detailpenjualans.create', compact('penjualans', 'produks', 'newIdDetail'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'idpenjualan'  => 'required|exists:penjualans,idpenjualan',
            'idproduk'     => 'required|exists:produks,idproduk',
            'jumlahproduk' => 'required|integer|min:1',
        ]);

        $produk = produk::where('idproduk', $request->idproduk)->firstOrFail();
        $subtotal = $produk->harga * $request->jumlahproduk;

        // Membuat detail penjualan
        detailpenjualan::create([
            'iddetail'     => Str::uuid()->toString(),
            'idpenjualan'  => $request->idpenjualan,
            'idproduk'     => $request->idproduk,
            'jumlahproduk' => $request->jumlahproduk,
            'subtotal'     => $subtotal,
        ]);

        // Update totalharga di penjualan
        $penjualan = penjualan::findOrFail($request->idpenjualan);
        $penjualan->totalharga += $subtotal;
        $penjualan->save();

        return redirect()->route('detailpenjualans.index')->with('success', 'Data Berhasil Disimpan!');
    }

    public function edit($iddetail): View
{
    // Cek apakah ID Detail Penjualan ada di database
    $detailPenjualan = detailpenjualan::find($iddetail);

    if (!$detailPenjualan) {
        abort(404, 'Data tidak ditemukan');
    }

    $penjualans = penjualan::all();
    $produks = produk::all();

    return view('detailpenjualans.edit', compact('detailPenjualan', 'penjualans', 'produks'));
}



    public function update(Request $request, $iddetail): RedirectResponse
    {
        $request->validate([
            'idpenjualan'  => 'required|exists:penjualans,idpenjualan',
            'idproduk'     => 'required|exists:produks,idproduk',
            'jumlahproduk' => 'required|integer|min:1',
        ]);

        $detailPenjualan = detailpenjualan::find($iddetail);
        if (!$detailPenjualan) {
            return redirect()->route('detailpenjualans.index')->with('error', 'Data tidak ditemukan!');
        }

        // Menghitung selisih harga untuk update totalharga di penjualan
        $oldSubtotal = $detailPenjualan->subtotal;
        $produk = produk::where('idproduk', $request->idproduk)->firstOrFail();
        $newSubtotal = $produk->harga * $request->jumlahproduk;

        // Update detail penjualan
        $detailPenjualan->update([
            'idpenjualan'  => $request->idpenjualan,
            'idproduk'     => $request->idproduk,
            'jumlahproduk' => $request->jumlahproduk,
            'subtotal'     => $newSubtotal,
        ]);

        // Update totalharga di penjualan
        $penjualan = penjualan::findOrFail($request->idpenjualan);
        $penjualan->totalharga = ($penjualan->totalharga - $oldSubtotal) + $newSubtotal;
        $penjualan->save();

        return redirect()->route('detailpenjualans.index')->with('success', 'Data Berhasil Diperbarui!');
    }

    public function destroy($iddetail): RedirectResponse
    {
        $detailPenjualan = detailpenjualan::find($iddetail);
        if (!$detailPenjualan) {
            return redirect()->route('detailpenjualans.index')->with('error', 'Data tidak ditemukan!');
        }

        $subtotal = $detailPenjualan->subtotal;
        $idPenjualan = $detailPenjualan->idpenjualan;
        $detailPenjualan->delete();

        // Update totalharga penjualan setelah detail dihapus
        $penjualan = penjualan::find($idPenjualan);
        if ($penjualan) {
            $penjualan->totalharga -= $subtotal;
            $penjualan->save();
        }

        return redirect()->route('detailpenjualans.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
