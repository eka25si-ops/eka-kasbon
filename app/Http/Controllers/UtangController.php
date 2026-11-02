<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Utang;
use Illuminate\Http\Request;

class UtangController extends Controller
{
    private function rules()
    {
        return [
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'keterangan'   => 'required|string|max:255',
            'jumlah'       => 'required|integer|min:1',
            'jatuh_tempo'  => 'required|date',
            'status'       => 'required|in:belum lunas,lunas',
        ];
    }

    private function messages()
    {
        return [
            'required' => ':attribute wajib diisi.',
            'integer'  => ':attribute harus berupa angka.',
            'min'      => ':attribute minimal :min.',
            'date'     => ':attribute harus berupa tanggal.',
            'exists'   => ':attribute tidak valid.',
            'in'       => ':attribute tidak valid.',
        ];
    }

    private function attributes()
    {
        return [
            'pelanggan_id' => 'Pelanggan',
            'keterangan'   => 'Keterangan',
            'jumlah'       => 'Jumlah',
            'jatuh_tempo'  => 'Jatuh tempo',
            'status'       => 'Status',
        ];
    }

    public function index()
    {
        // Eloquent: ambil utang beserta relasi pelanggan
        $utangs = Utang::with('pelanggan')->latest()->get();
        return view('admin.utang.index', compact('utangs'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::orderBy('nama')->get();
        return view('admin.utang.create', compact('pelanggans'));
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules(), $this->messages(), $this->attributes());
        Utang::create($data);

        return redirect()->route('utang.index')
            ->with('success', 'Data utang berhasil ditambahkan.');
    }

    public function edit(Utang $utang)
    {
        $pelanggans = Pelanggan::orderBy('nama')->get();
        return view('admin.utang.edit', compact('utang', 'pelanggans'));
    }

    public function update(Request $request, Utang $utang)
    {
        $data = $request->validate($this->rules(), $this->messages(), $this->attributes());
        $utang->update($data);

        return redirect()->route('utang.index')
            ->with('success', 'Data utang berhasil diperbarui.');
    }

    public function destroy(Utang $utang)
    {
        try {
            $utang->delete();
            return redirect()->route('utang.index')
                ->with('success', 'Data utang berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('utang.index')
                ->with('error', 'Data utang gagal dihapus.');
        }
    }
}
