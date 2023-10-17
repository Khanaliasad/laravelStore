<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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

    public function cart(Request $request)
    {
        $sessionId = $request->session()->getId();
        $cartItems = Cart::where("session_id", $sessionId)->with('items.product')->get()->toArray();
        if (count($cartItems[0]['items'])<1) {
            $categoryIds = Category::pluck("id")->toArray();

            $Products = [];

            foreach ($categoryIds as $category) {
                $categoryProducts = Product::where('category_id', $category)
                    ->whereIn('attribute', ['top', 'sale', 'new'])
                    ->with('variants.images')
                    ->limit(2)
                    ->get()
                    ->toArray();

                $Products = array_merge($Products, $categoryProducts);
            }
            return view('pages.cart', compact('Products'));

        }
        $categoryArray = [];

        foreach ($cartItems[0]['items'] as $item) {
            array_push($categoryArray, $item['product']['category_id']);

        };

        // chatGpt
        // Define the minimum and maximum total products
        $minTotalProducts = 8;
        $maxTotalProducts = 10;

// Calculate the total number of products based on array length
        $totalProducts = count($categoryArray);

// Calculate the minimum and maximum products per category
        $minProductsPerCategory = floor($minTotalProducts / count(array_count_values($categoryArray)));
        $maxProductsPerCategory = floor($maxTotalProducts / count(array_count_values($categoryArray)));

// Initialize an array to store the selected products
        $selectedProducts = [];

// Iterate through categories and select products
        foreach (array_count_values($categoryArray) as $categoryId => $categoryCount) {
            // Calculate the number of products for this category within the constraints
            $productsToFetch = max($minProductsPerCategory, min($maxProductsPerCategory, $categoryCount));

            // Fetch products for the current category
            $categoryProducts = Product::where('category_id', $categoryId)
                ->whereIn('attribute', ['top', 'sale', 'new'])
                ->with('variants.images')
                ->limit($productsToFetch)
                ->get()
                ->toArray();

            // Merge the fetched products into the selected products array
            $selectedProducts = array_merge($selectedProducts, $categoryProducts);
        }

        $Products =$selectedProducts;
        return view('pages.cart', compact('Products'));
    }

    public
    function checkout(Request $request)
    {
        $path = $request->path();
        $crumb = explode("/", $path);
        return view('pages.checkout', compact('path', 'crumb'));
    }
}
