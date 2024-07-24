<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::random(10) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/images', $imageName);

            $imagePath = storage_path('app/public/images/' . $imageName);
            $imageData = base64_encode(file_get_contents($imagePath));


            return response()->json(['imageName' => $imageName, 'imageData' => $imageData], 200);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
