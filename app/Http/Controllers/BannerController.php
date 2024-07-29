<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    public function banner()
    {
        $banner = Banner::all();
        return view('backend.banner.banner', compact('banner'));
    }

    public function update_banner(Request $request, $id)
    {
        $request->validate([
            'title' =>'required',
            'offer_persentage' =>'required',
            'name' =>'required',
            'short_detail' =>'required',
            'button_link' =>'required',
        ]);

        if ($request->photo == null) {
            $banner = Banner::find($id);
            $banner->update([
                'title' => $request->title,
                'offer_persentage' => $request->offer_persentage,
                'name' => $request->name,
                'short_detail' => $request->short_detail,
                'button_link' => $request->button_link,
            ]);
        } else {
            $banner = Banner::find($id);
            unlink(public_path('uploads/banner/' . $banner->photo));

            $photo = $request->photo->extension();
            $file_name = 'banner-' . random_int(100, 999) . '.' . $photo;

            $banner->update([
                'title' => $request->title,
                'offer_persentage' => $request->offer_persentage,
                'name' => $request->name,
                'short_detail' => $request->short_detail,
                'button_link' => $request->button_link,
                'photo' => $file_name,
            ]);
        }
    }
}
