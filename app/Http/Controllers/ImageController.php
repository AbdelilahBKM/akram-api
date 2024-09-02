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

            $path = $image->storeAs('images', $imageName, 'public');

            $imageUrl = Storage::url($path);

            return response()->json(['imageName' => $imageName, 'imageUrl' => $imageUrl], 200);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
