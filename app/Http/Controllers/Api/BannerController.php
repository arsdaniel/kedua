<?php

namespace App\Http\Controllers\Api;

use App\Banner;
use App\Http\Controllers\Controller;
use App\Laravue\JsonResponse;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    //
    public function getBanner()
    {

        $query = Banner::whereNotNull('id');

        // PROVIDE THE DATA
        $data = $query->orderBy('ordinal')->get();
    
        return response()->json(new JsonResponse(['items' => $data]));
        
    }
}
