<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $arr;

    public function index(Request $request)
    {
        $path = $request->path();
        $show = $request->input('show', 3);
        $page = $request->input('page', 1);
        $sort = $request->input('sort', "price");
        $crumb = explode("/", $path);
        $requestedCategory = str_replace("-", " ", $crumb[1]);
        $requestedCategoryId = Category::all()->where("name", $requestedCategory)->pluck('id')->first();
        if (is_null($requestedCategoryId)) {
            return abort(404);
        }
        $products = Product::where('category_id', $requestedCategoryId);
        $products->with('variants.images')->orderBy($sort);
        $totalProducts = $products->count();
        $totalPages = ceil($totalProducts / $show);
        $products->Paginate($show);
        $this->arr = ["products" => $products->get(), compact('path', 'crumb', 'totalPages', 'totalProducts', 'requestedCategoryId', 'requestedCategory', "show", "page")];
        if ($request->ajax()) {
            return $this->arr;

        }

        return view('pages.catalog', compact('path', 'crumb', 'totalPages', 'totalProducts', 'requestedCategoryId', 'requestedCategory', "show", "page"));
    }

    public function search(Request $request)
    {
        $path = $request->path();
        $crumb = explode("/", $path);
        return view('pages.contact', compact('path', 'crumb'));
    }
}
