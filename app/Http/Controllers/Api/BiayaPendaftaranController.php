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
}
