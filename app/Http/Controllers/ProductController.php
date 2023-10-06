<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request, $id)
    {
        $path = $request->path();
        $crumb = explode("/",$path);

        $product = Product::where('id', $id)->with('variants.images')->first();
        $relatedProducts= Product::where('category_id',$product['category_id'])->with('variants.images')->limit(10)->get();
        if (!$product) {
            abort(404);
        }
//        dd(compact('path','crumb','product'));
        return view('pages.product',compact('path','crumb','product','relatedProducts'));
    }
}
