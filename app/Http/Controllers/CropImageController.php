<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CropImageController extends Controller
{
    public function uploadCropImage(Request $request)
    {
        $image = $request->image;

        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name= time().'.png';
        $path = public_path('uploads/cover-images/'.$image_name);
        dd($path);
        file_put_contents($path, $image);
        return response()->json(['status'=>true]);
    }
    
}
