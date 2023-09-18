<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
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
}
