<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    private function rules()
    {
        return [
            'nama'         => 'required|string|max:100',
            'kategori'     => 'required|string|max:50',
            'harga_eceran' => 'required|integer|min:0',
            'harga_grosir' => 'required|integer|min:0',
            'stok'         => 'required|integer|min:0',
        ];
    }

    private function messages()
    {
        return [
            'required' => ':attribute wajib diisi.',
            'integer'  => ':attribute harus berupa angka.',
            'min'      => ':attribute tidak boleh kurang dari 0.',
            'max'      => ':attribute terlalu panjang.',
        ];
    }

    public function index()
    {
        $barangs = Barang::latest()->get();
        return view('admin.barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('admin.barang.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules(), $this->messages());
        Barang::create($data);

        return redirect()->route('barang.index')
            ->with('success', 'Data barang berhasil ditambahkan.');
    }

    public function edit(Barang $barang)
    {
        return view('admin.barang.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang)
    {
        $data = $request->validate($this->rules(), $this->messages());
        $barang->update($data);

        return redirect()->route('barang.index')
            ->with('success', 'Data barang berhasil diperbarui.');
    }

    public function destroy(Barang $barang)
    {
        try {
            $barang->delete();
            return redirect()->route('barang.index')
                ->with('success', 'Data barang berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('barang.index')
                ->with('error', 'Data barang gagal dihapus.');
        }
    }
}