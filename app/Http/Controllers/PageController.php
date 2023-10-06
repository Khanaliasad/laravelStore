<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $_products;
    protected $_catagories;

    public function __construct()
    {
        $this->_products = Product::with('variants.images')->get();
        $this->_catagories = Category::all()->pluck('name')->toArray();
    }

    public function home()
    {

        $categoryIds = Category::pluck("id")->toArray();

        $homeProducts = [];

        foreach ($categoryIds as $category) {
            $categoryProducts = Product::where('category_id', $category)
                ->whereIn('attribute', ['top', 'sale', 'new'])
                ->with('variants.images')
                ->limit(2)
                ->get()
                ->toArray();

            $homeProducts = array_merge($homeProducts, $categoryProducts);
        }
//        dd($homeProducts);
        $categories = $this->_catagories;
        return view('pages.home', compact('categories', "homeProducts"));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact(Request $request)
    {
        $path = $request->path();
        $crumb = explode("/", $path);
        return view('pages.contact', compact('path', 'crumb'));
    }

    public function postcontact(Request $request)
    {
        $path = $request->path();
        $crumb = explode("/", $path);
        return view('pages.contact', compact('path', 'crumb'));
    }

    public function getAllProducts($products)
    {
        // Retrieve the products with their variants and images

        // Initialize an empty array to store the result
        $productArray = [];

        // Iterate through each product
        foreach ($products as $product) {
            // Iterate through each variant of the product
            foreach ($product->variants as $variant) {
                // Iterate through each image of the variant
                foreach ($variant->images as $image) {
                    // Create an array with all columns from products, product_variants, and product_images
                    $productDetails = [
                        'Product Name' => $product->name,
                        'SKU' => $product->SKU,
                        'Fabric' => $product->fabric,
                        'Description' => $product->description,
                        'Weight' => $product->weight,
                        'Category ID' => $product->category_id,
                        'Variant Color' => $variant->color,
                        'Variant Size' => $variant->size,
                        'Variant Price' => $variant->price,
                        'Variant Stock Quantity' => $variant->stock_quantity,
                        'Image Path' => $image->image_path,
                    ];

                    // Add the product details to the result array
                    $productArray[] = $productDetails;
                }
            }
        }

        // Return the result as a JSON response or do as needed
        //return response()->json($productArray);

        return $productArray;
    }
}
