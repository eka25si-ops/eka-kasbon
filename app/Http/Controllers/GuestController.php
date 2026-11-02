<?php

namespace App\Http\Controllers;

use App\Models\Utang;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function index()
    {
        // Eloquent: utang + relasi pelanggan
        $utangs = Utang::with('pelanggan')->latest()->get();

        // Query Builder: cicilan join utang & pelanggan
        $cicilans = DB::table('cicilans')
            ->join('utangs', 'cicilans.utang_id', '=', 'utangs.id')
            ->leftJoin('pelanggans', 'utangs.pelanggan_id', '=', 'pelanggans.id')
            ->select(
                'cicilans.*',
                'utangs.keterangan',
                'pelanggans.nama as nama_pelanggan'
            )
            ->orderByDesc('cicilans.tanggal_bayar')
            ->limit(10)
            ->get();

        return view('guest.index', compact('utangs', 'cicilans'));
    }
}
