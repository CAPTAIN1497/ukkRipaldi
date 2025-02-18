<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProdukController extends Controller
{
    public function index(): View
    {
        $produks = Produk::latest()->paginate(5);
        return view('produks.index', compact('produks'));
    }

    public function create(): View
    {
        return view('produks.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'idproduk'    => 'required|unique:produks,idproduk',
            'namaperoduk' => 'required|min:3',
            'harga'       => 'required|numeric',
            'stok'        => 'required|integer'
        ]);

        Produk::create([
            'idproduk'    => $request->idproduk,
            'namaperoduk' => $request->namaperoduk,
            'harga'       => $request->harga,
            'stok'        => $request->stok
        ]);

        return redirect()->route('produks.index')->with(['success' => 'Produk Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        $produk = Produk::findOrFail($id);
        return view('produks.show', compact('produk'));
    }

    public function edit(string $id): View
    {
        $produk = Produk::findOrFail($id);
        return view('produks.edit', compact('produk'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'namaperoduk' => 'required|min:3',
            'harga'       => 'required|numeric',
            'stok'        => 'required|integer'
        ]);

        $produk = Produk::findOrFail($id);
        $produk->update([
            'namaperoduk' => $request->namaperoduk,
            'harga'       => $request->harga,
            'stok'        => $request->stok
        ]);

        return redirect()->route('produks.index')->with(['success' => 'Produk Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('produks.index')->with(['success' => 'Produk Berhasil Dihapus!']);
    }
}
