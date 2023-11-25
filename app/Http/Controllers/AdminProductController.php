<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');

    }

    public function index()
    {
        $allProducts = Product::with('variants.images')->get()->toArray();
        return view('pages.admin.products',compact("allProducts"));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        return view('pages.admin.productDetail');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        return view('pages.admin.productEdit');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product , $id)
    {
        $res = Product::destroy($id);
        if ($res) {
            return  redirect(route('admin.products'))->with('success', 'Product deleted successfully');
        } else {
            return  redirect(route('admin.products'))->with('error', 'Error while deleting product');
        }
        //
    }
}
