<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PenjualanController extends Controller
{
    public function index(): View
    {
        $penjualans = Penjualan::latest()->paginate(5);
        return view('penjualans.index', compact('penjualans'));
    }

    public function create(): View
    {
        return view('penjualans.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'idpenjualan'     => 'required|unique:penjualans',
            'tanggalpenjualan' => 'required|date',
            'totalharga'       => 'required|numeric',
            'idpelanggan'      => 'required'
        ]);

        // Membuat data penjualan baru
        Penjualan::create($request->all());

        return redirect()->route('penjualans.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        $penjualan = Penjualan::findOrFail($id);
        return view('penjualans.show', compact('penjualan'));
    }

    public function edit(string $id): View
    {
        $penjualan = Penjualan::findOrFail($id);
        return view('penjualans.edit', compact('penjualan'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'tanggalpenjualan' => 'required|date',
            'totalharga'       => 'required|numeric',
            'idpelanggan'      => 'required'
        ]);

        // Mencari data penjualan dan memperbarui
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->update($request->all());

        return redirect()->route('penjualans.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        // Menghapus data penjualan
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->delete();

        return redirect()->route('penjualans.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
