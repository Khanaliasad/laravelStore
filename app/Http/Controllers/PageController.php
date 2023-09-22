<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function home(){
        $categories = Category::all()->pluck('name')->toArray();
        $products = Product::all();
        dd($products);
        return view('pages.home',compact('categories'));
    }
    public function about()
    {
        return view('pages.about');
    }
    public function contact(Request $request )
    {
        $path = $request->path();
        $crumb = explode("/",$path);
        return view('pages.contact',compact('path','crumb'));
    }
    public function postcontact(Request $request )
    {
        $path = $request->path();
        $crumb = explode("/",$path);
        return view('pages.contact',compact('path','crumb'));
    }
}
