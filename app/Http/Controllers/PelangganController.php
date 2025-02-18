<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class pelangganController extends Controller
{
    public function index(): View
    {
        $pelanggans = pelanggan::latest()->paginate(5);
        return view('pelanggans.index', compact('pelanggans'));
    }

    public function create(): View
    {
        return view('pelanggans.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'idpelanggan'  => 'required|unique:pelanggans',
            'namapelanggan' => 'required|min:3',
            'alamat'       => 'required|min:5',
            'nomortelpon'  => 'required|numeric'
        ]);

        pelanggan::create($request->all());

        return redirect()->route('pelanggans.index')->with(['success' => 'Pelanggan Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        $pelanggan = pelanggan::findOrFail($id);
        return view('pelanggans.show', compact('pelanggan'));
    }

    public function edit(string $id): View
    {
        $pelanggan = pelanggan::findOrFail($id);
        return view('pelanggans.edit', compact('pelanggan'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'namapelanggan' => 'required|min:3',
            'alamat'       => 'required|min:5',
            'nomortelpon'  => 'required|numeric'
        ]);

        $pelanggan = pelanggan::findOrFail($id);
        $pelanggan->update($request->all());

        return redirect()->route('pelanggans.index')->with(['success' => 'Pelanggan Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $pelanggan = pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggans.index')->with(['success' => 'Pelanggan Berhasil Dihapus!']);
    }
}
