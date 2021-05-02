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

    public function update(Request $request, $id)
    {
        $banner = Banner::find($id);
        if ($request->hasFile('image')) {
            $imageName = $request->image->getClientOriginalName();
            $image = $request->image;
            $image->move('uploads/images/banner', $imageName);
            $banner->image = '/uploads/images/banner/'.$imageName;
            $banner->title = $request->title;
            $banner->description = $request->description;
            $banner->status = $request->status;
            $banner->save();
        } else {
            $banner->title = $request->title;
            $banner->description = $request->description;
            $banner->status = $request->status;
            $banner->save();
        }
    }

    public function store(Request $request)
    {
        $banner = new Banner();
        $imageName = time() . '.' . $request->image->extension();
        $banner->image = $imageName;
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->save();
    }

}
