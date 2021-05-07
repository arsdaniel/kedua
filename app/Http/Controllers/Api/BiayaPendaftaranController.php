<?php

namespace App\Http\Controllers\api;

use App\BiayaPendaftaran;
use App\Http\Controllers\Controller;
use App\Laravue\JsonResponse;
use Illuminate\Http\Request;

class BiayaPendaftaranController extends Controller
{
    //
    public function getBiaya()
    {
        $query = BiayaPendaftaran::whereNotNull('id');

        // PROVIDE THE DATA
        $data = $query->orderBy('tahun_ajaran')->get();

        return response()->json(new JsonResponse(['items' => $data]));
    }

    public function store(request $request)
    {
        $biayaPendaftaran = new BiayaPendaftaran();
        $biayaPendaftaran->nama_biaya = $request->nama_biaya;
        $biayaPendaftaran->tahun_ajaran = $request->tahun_ajaran;
        $biayaPendaftaran->sekolah = $request->sekolah;
        $biayaPendaftaran->harga = $request->harga;
        $biayaPendaftaran->save();

    }
}
