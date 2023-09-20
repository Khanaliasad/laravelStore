<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $path = $request->path();
        $crumb = explode("/",$path);
        return view('pages.product',compact('path','crumb'));
    }
}
