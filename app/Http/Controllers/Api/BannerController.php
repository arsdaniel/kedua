<?php

namespace App\Http\Controllers\Api;

use App\Banner;
use App\Http\Controllers\Controller;
use App\Http\Resources\BannerResource;
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

    public function show(Banner $banner)
    {
        return new BannerResource($banner);
    }

    public function update(Request $request, Banner $banner)
    {

        // $image = $request->get('image');
        // $imageName = $image->getClientOriginalName();
        // $imageName = time() . '_' . $imageName;

        // $image->move(public_path('/images'), $imageName);

        // //$banner->image = '/images' . $imageName;
        $banner->title = $request->get('title');
        $banner->description = $request->get('description');
        $banner->save();
    }

    private function getValidationRules($isNew = true)
    {
        return [
            'image' => $isNew ? 'required' : 'required',
        ];
    }
}
