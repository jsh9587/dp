<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    //
    public function index(request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // 이미지 업로드
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $path = $file->store('images', 'public'); // 'public' 디스크에 이미지 저장

            // 클라이언트에 반환할 URL 생성
            $url = Storage::url($path);
            return response()->json(['url' => $url]);
        }

        return response()->json(['error' => 'Image upload failed'], 500);
    }
}
