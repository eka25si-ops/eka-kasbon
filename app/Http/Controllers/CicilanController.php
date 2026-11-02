<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CicilanController extends Controller
{
    private function rules()
    {
        return [
            'utang_id'      => 'required|exists:utangs,id',
            'tanggal_bayar' => 'required|date',
            'jumlah_bayar'  => 'required|integer|min:1',
            'catatan'       => 'nullable|string|max:255',
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
        ];
    }

    private function attributes()
    {
        return [
            'utang_id'      => 'Utang',
            'tanggal_bayar' => 'Tanggal bayar',
            'jumlah_bayar'  => 'Jumlah bayar',
            'catatan'       => 'Catatan',
        ];
    }

    // daftar utang untuk dropdown (join ke pelanggans)
    private function daftarUtang()
    {
        return DB::table('utangs')
            ->join('pelanggans', 'utangs.pelanggan_id', '=', 'pelanggans.id')
            ->select('utangs.id', 'utangs.keterangan', 'utangs.jumlah', 'pelanggans.nama as nama_pelanggan')
            ->orderBy('pelanggans.nama')
            ->get();
    }

    public function index(Request $request)
    {
        $q = $request->query('q');

        $cicilans = DB::table('cicilans')
            ->join('utangs', 'cicilans.utang_id', '=', 'utangs.id')
            ->leftJoin('pelanggans', 'utangs.pelanggan_id', '=', 'pelanggans.id')
            ->select(
                'cicilans.*',
                'utangs.keterangan',
                'utangs.jumlah as total_utang',
                'pelanggans.nama as nama_pelanggan'
            )
            // nested where: (nama LIKE ... OR keterangan LIKE ...)
            ->when($q, function ($query) use ($q) {
                $query->where(function ($sub) use ($q) {
                    $sub->where('pelanggans.nama', 'like', "%{$q}%")
                        ->orWhere('utangs.keterangan', 'like', "%{$q}%");
                });
            })
            ->orderByDesc('cicilans.tanggal_bayar')
            ->get();

        return view('admin.cicilan.index', compact('cicilans', 'q'));
    }

    public function create()
    {
        $utangs = $this->daftarUtang();
        return view('admin.cicilan.create', compact('utangs'));
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules(), $this->messages(), $this->attributes());
        $data['created_at'] = now();
        $data['updated_at'] = now();

        DB::table('cicilans')->insert($data);

        return redirect()->route('cicilan.index')
            ->with('success', 'Data cicilan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $cicilan = DB::table('cicilans')->where('id', $id)->first();
        abort_if(!$cicilan, 404);

        $utangs = $this->daftarUtang();
        return view('admin.cicilan.edit', compact('cicilan', 'utangs'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate($this->rules(), $this->messages(), $this->attributes());
        $data['updated_at'] = now();

        DB::table('cicilans')->where('id', $id)->update($data);

        return redirect()->route('cicilan.index')
            ->with('success', 'Data cicilan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        try {
            DB::table('cicilans')->where('id', $id)->delete();
            return redirect()->route('cicilan.index')
                ->with('success', 'Data cicilan berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('cicilan.index')
                ->with('error', 'Data cicilan gagal dihapus.');
        }
    }
}
