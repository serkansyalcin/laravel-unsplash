<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageStoreRequest;
use App\Models\Category;

class ImageController extends Controller
{
    public function store(ImageStoreRequest $request) {
        dd($request);
        $category = Category::firstOrCreate(['name' => $request->category_id]);
        $category->images()->create($request->validated());
    }
}
