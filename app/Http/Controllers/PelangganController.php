<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    private function rules()
    {
        return [
            'nama'   => 'required|string|max:100',
            'no_hp'  => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
        ];
    }

    private function messages()
    {
        return [
            'required' => ':attribute wajib diisi.',
            'max'      => ':attribute terlalu panjang.',
        ];
    }

    public function index()
    {
        $pelanggans = Pelanggan::latest()->get();
    return view('admin.pelanggan.index', compact('pelanggans'));
    }

    public function create()
    {
        return view('admin.pelanggan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules(), $this->messages());
        Pelanggan::create($data);

        return redirect()->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil ditambahkan.');
    }

    public function edit(Pelanggan $pelanggan)
    {
        return view('admin.pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $data = $request->validate($this->rules(), $this->messages());
        $pelanggan->update($data);

        return redirect()->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil diperbarui.');
    }

    public function destroy(Pelanggan $pelanggan)
    {
        try {
            $pelanggan->delete();
            return redirect()->route('pelanggan.index')
                ->with('success', 'Data pelanggan berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('pelanggan.index')
                ->with('error', 'Data pelanggan gagal dihapus.');
        }
    }
}