<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function uploadImage(Request $request)
    {
        // Validate the uploaded image
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Check if the request has a file named 'image'
        if ($request->hasFile('image')) {
            // Get the uploaded image
            $image = $request->file('image');

            // Generate a random name for the image with the original extension
            $imageName = Str::random(10) . '.' . $image->getClientOriginalExtension();

            // Store the image in the 'public/images' directory
            $path = $image->storeAs('public/images', $imageName);

            // Get the full path of the stored image
            $imagePath = storage_path('app/public/images/' . $imageName);

            // Return the image name and base64-encoded data in the response
            return response()->json(['imageName' => $imageName], 200);
        }

        // Return an error response if no file was uploaded
        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
