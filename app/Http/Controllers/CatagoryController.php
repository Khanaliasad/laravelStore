<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatagoryController extends Controller
{
    public function index(Request $request)
    {
        $path = $request->path();
        $crumb = explode("/",$path);
        // dd($path);
        return view('pages.catalog',compact('path','crumb'));
    }
    public function search(Request $request )
    {
        $path = $request->path();
        $crumb = explode("/",$path);
        return view('pages.contact',compact('path','crumb'));
    }
}
