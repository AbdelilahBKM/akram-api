<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ImageController extends Controller
{
    public function uploadImage(Request $request)
    {
        try {
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

                // Log the image path
                Log::info('Image uploaded successfully: ' . $imagePath);

                // Return the image name in the response
                return response()->json(['imageName' => $imageName], 200);
            }

            // Return an error response if no file was uploaded
            return response()->json(['error' => 'No file uploaded'], 400);
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Image upload error: ' . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'Image upload failed'], 500);
        }
    }
}
