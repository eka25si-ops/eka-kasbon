<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
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
        $suppliers = Supplier::latest()->get();
        return view('admin.supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('admin.supplier.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules(), $this->messages());
        Supplier::create($data);

        return redirect()->route('supplier.index')
            ->with('success', 'Data supplier berhasil ditambahkan.');
    }

    public function edit(Supplier $supplier)
    {
        return view('admin.supplier.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $data = $request->validate($this->rules(), $this->messages());
        $supplier->update($data);

        return redirect()->route('supplier.index')
            ->with('success', 'Data supplier berhasil diperbarui.');
    }

    public function destroy(Supplier $supplier)
    {
        try {
            $supplier->delete();
            return redirect()->route('supplier.index')
                ->with('success', 'Data supplier berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('supplier.index')
                ->with('error', 'Data supplier gagal dihapus.');
        }
    }
}