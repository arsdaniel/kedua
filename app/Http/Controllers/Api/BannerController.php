<?php

namespace App\Http\Controllers\Api;

use App\Banner;
use App\Http\Controllers\Controller;
use App\Laravue\JsonResponse;
use Illuminate\Http\Request;
use Validator;

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

    public function update(Request $request, Banner $banner)
    {
        

        $validator = Validator::make($request->all(), $this->getValidationRules(false));
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 403);
        } else {

            $banner->image = $request->get('image');
            $banner->save();
            return new BannerResource($banner);
        }
    }

    private function getValidationRules($isNew = true)
    {
        return [
            'image' => $isNew ? 'required': 'required|email',
        ];
    }
}
