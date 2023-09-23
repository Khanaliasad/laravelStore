<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatagoryController extends Controller
{
    public function index(Request $request)
    {
        $path = $request->path();
        $crumb = explode("/", $path);
        $requestedCategory = str_replace("-", " ", $crumb[1]);
        $requestedCategoryId = Category::all()->where("name", $requestedCategory)->pluck('id')->first();
        if (is_null($requestedCategoryId)) {
            return abort(404);
        }
        $products = Product::where('category_id', $requestedCategoryId)
            ->with('variants.images')
            ->get()
            ->toArray();
//        dd($products);
        return view('pages.catalog', compact('path', 'crumb', 'products'));
    }

    public function search(Request $request)
    {
        $path = $request->path();
        $crumb = explode("/", $path);
        return view('pages.contact', compact('path', 'crumb'));
    }
}
