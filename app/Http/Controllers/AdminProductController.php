<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $attr;
    private $variantSizes;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->attr = [
            ['value' => '', 'name' => 'none'],
            ['value' => 'top', 'name' => 'top'],
            ['value' => 'new', 'name' => 'new'],
            ['value' => 'sale', 'name' => 'sale'],
        ];
        $this->variantSizes = ["S", "M", "L", "XL"];
    }

    public function index()
    {
        $allProducts = Product::with('variants.images')->get()->toArray();
        return view('pages.admin.products', compact("allProducts"));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $attributes = $this->attr;
        $variantSizes = $this->variantSizes;
        $allCategories = Category::all()->toArray();

        return view('pages.admin.productCreate', compact('attributes', 'variantSizes','allCategories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $req = $request->except(['_token', 'new_variant']);
        $new_variant = $request->get('new_variant');
        $res = Product::create($req);
        if (isset($new_variant)) {
            foreach ($new_variant as $v_id => $variant) {
                $res = ProductVariant::create($variant);
            }
        }
        return redirect(route('admin.products'))->with('success', 'Product Created successfully');

        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product, $id)
    {
        $attributes = $this->attr;
        $productDetail = Product::with('variants.images')->where('id', $id)->first();
        if (is_null($productDetail)) {
            abort(404);
        }
        $allCategories = Category::all()->toArray();
        $variantSizes = $this->variantSizes;

        return view('pages.admin.productEdit', ['productDetail' => $productDetail->toArray(), 'id' => $id, 'attributes' => $attributes, 'allCategories' => $allCategories, 'variantSizes' => $variantSizes, 'edit' => false]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, Category $category, $id)
    {
        //
        $attributes = $this->attr;
        $variantSizes = $this->variantSizes;
        $productDetail = Product::with('variants.images')->where('id', $id)->first();
        $allCategories = Category::all()->toArray();
        $edit = true;
        if (is_null($productDetail)) {
            abort(404);
        }
        return view('pages.admin.productEdit', compact('productDetail', 'id', 'allCategories', 'attributes', 'variantSizes', 'edit'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product, $id)
    {
        $req = $request->except(['_token', 'variants', 'new_variant']);
        $variants = $request->get('variants');
        $new_variant = $request->get('new_variant');
        $res = Product::where('id', $id)->update($req);
        foreach ($variants as $v_id => $variant) {
            $res = ProductVariant::where('id', $v_id)->update(Arr::except($variant, ['id']));
        }
        if (isset($new_variant)) {
            foreach ($new_variant as $v_id => $variant) {
                $res = ProductVariant::create($variant);
            }
        }
        return redirect(route('admin.productedit', $id))->with('success', 'Product updated successfully');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, $id)
    {
        $res = Product::destroy($id);
        if ($res) {
            return redirect(route('admin.products'))->with('success', 'Product deleted successfully');
        } else {
            return redirect(route('admin.products'))->with('error', 'Error while deleting product');
        }
        //
    }

    public function destroyVariant(ProductVariant $productvariant, $id)
    {
        try {
            $res = ProductVariant::destroy($id);
            return ["success" => !!$res, "error" => !$res, 'data' => ['message' => 'Successfully Deleted Variant: ' . $id]];
        } catch (\Exception $e) {
            $res = false;
            return ["success" => !!$res, "error" => !$res, 'data' => ['message' => 'Error Deleting Variant: ' . $id]];


        }

        //
    }
}
