<?php

namespace App\Http\Controllers\Api;

use App\system\Config;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    //
    public function index()
    {
        $data = Config::first();

        return response()->json([
            'status' => 'true',
            'message' => 'Successfully get banner data',
            'data' => $data,
        ]);
    }
}
