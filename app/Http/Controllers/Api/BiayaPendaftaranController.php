<?php

namespace App\Http\Controllers\api;

use App\BiayaPendaftaran;
use App\Http\Controllers\Controller;
use App\Http\Resources\BiayaPendaftaranResource;
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
    public function show(BiayaPendaftaran $biayaPendaftaran)
    {
        return new BiayaPendaftaranResource($biayaPendaftaran);
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

    public function update(request $request, $id)
    {
        $biayaPendaftaran = BiayaPendaftaran::find($id);
        $biayaPendaftaran->nama_biaya = $request->nama_biaya;
        $biayaPendaftaran->tahun_ajaran = $request->tahun_ajaran;
        $biayaPendaftaran->sekolah = $request->sekolah;
        $biayaPendaftaran->harga = $request->harga;
        $biayaPendaftaran->save();
    }
}
