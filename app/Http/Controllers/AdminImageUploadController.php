<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class AdminImageUploadController extends Controller
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

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $productVariant = ProductVariant::with('product')->where('id', $id)->first();
        $product_id = $productVariant->product_id;
        $SKU = $productVariant->product->SKU;
        $name = $productVariant->product->name;
//        dd($name,$productVariant->toArray());

        return view('pages.admin.uploadImage', compact("id", 'product_id', 'name', 'SKU'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'file' => 'required',
        ]);

        if ($request->hasFile('file')) {

            $image = $request->file('file');
            $allowedFileExtension = ['svg', 'jpg', 'png', 'jpeg', 'SVG', 'JPG', 'PNG', 'JPEG'];
            $errorFileNames = "";
//            $imageData = '';

            $extension = $image->getClientOriginalExtension();
            $imageExtensionCheck = in_array($extension, $allowedFileExtension);

            if ($imageExtensionCheck) {

                $new_name = time() . $image->getClientOriginalName();

                if (!file_exists("img/product/images")) {
                    mkdir('img/product/images', 0755, true);
                }
                $image->move(public_path('img/product/images/'), $new_name);
                $image_url = "/img/product/images/" . $new_name;
                $data['product_variant_id'] = $id;
                $data['image_path'] = $image_url;
                $imageData = ProductImage::create($data);
            } else {
                if (empty($errorFileNames)) {
                    $errorFileNames = $image->getClientOriginalName();
                } else {
                    $errorFileNames = $errorFileNames . "," . $image->getClientOriginalName();
                }
            }

            if (!empty($errorFileNames)) {
                $output = array(
                    'asad' => $imageData,
                    'success' => false,
                    'error' => true,
                    'message' => $errorFileNames . ' these files have wrong extension'
                );
            } else {
                $output = array(
                    'image' => $imageData,
                    'success' => true,
                    'error' => false,
                    'message' => 'Images uploaded successfully. ',
                );
            }
            return response()->json($output);
        }


    }

    /**
     * Display the specified resource.
     */
    public
    function show(Product $product, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public
    function edit(Product $product, Category $category, $id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public
    function update(Request $request, Product $product)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public
    function destroy(Product $product, $id)
    {
        $productImage = ProductImage::where('id', $id)->first();
        $image_path = $productImage->image_path;
//        $product_variant_id = $productImage->product_variant_id;
        \File::delete(public_path($image_path));
        $res = ProductImage::destroy($id);
//        dd(back().'#variant-'.$product_variant_id);
        if ($res) {
            return back()->with('success', 'Product Image deleted successfully');
        } else {
            return back()->with('error', 'Error while deleting product');
        }
    }
}
