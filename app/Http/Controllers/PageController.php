<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    protected $_products;
    protected $_catagories;

    public function __construct()
    {
        $this->_products = Product::with('variants.images')->get();
        $this->_catagories = Category::all()->pluck('name')->toArray();
        ini_set('max_execution_time', 5000);
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
        if (isset($cartItems[0]['items'])) {
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
        if (isset($cartItems[0])) {
            foreach ($cartItems[0]['items'] as $item) {
                array_push($categoryArray, $item['product']['category_id']);

            };
        } else {
            $categoryArray = [1, 2, 3, 4];
        }

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

        $Products = $selectedProducts;
        return view('pages.cart', compact('Products'));
    }

    public function checkout(Request $request)
    {
        $path = $request->path();
        $crumb = explode("/", $path);
        return view('pages.checkout', compact('path', 'crumb'));
    }

    function order(Request $request)
    {
//        dd(Order::with('items.product.variants')->get()->toArray());

        $user_id = $request->get('user_id');
        $order_date = $request->get('order_date');
        $customer_name = $request->get('customer_name');
        $customer_last_name = $request->get('customer_last_name');
        $customer_email = $request->get('customer_email');
        $customer_phone = $request->get('customer_phone');
        $customer_address = $request->get('customer_address');
        $order_description = $request->get('order_description');
        $session_id = session()->getId();
        $main_cart = Cart::with('items')->where("session_id", $session_id)->first();
        if ($main_cart == null) {
            return redirect('checkout')->with('error', 'your cart is empty');
        }

        $cart = Cart::with(['items.product', 'items.variant.images'])
            ->join('cart_items', 'carts.id', '=', 'cart_items.cart_id')
            ->where('carts.session_id', $session_id)
            ->groupBy('carts.id')
            ->select('carts.*')
            ->get();
        $subtotal = 0;
        $discount = 0;
        $status = 'processing';

        foreach ($cart as $cartItem) {
            foreach ($cartItem['items'] as $item) {
                // Accessing quantity and product price
                $quantity = $item['quantity'];
                $price = $item['product']['price'];

                // Calculate subtotal for each item
                $itemSubtotal = $quantity * $price;

                // Accumulate the subtotal
                $subtotal += $itemSubtotal;
            }
        }
        $total_amount = $subtotal - $discount;
        try {
            $orderData = compact("user_id", "order_date", "customer_name", "customer_last_name", "customer_email", "customer_phone", "customer_address", "status", "order_description", "subtotal", "discount", "total_amount");
            $order = Order::create($orderData);
            $order_id = $order['id'];

            foreach ($cart as $cartItem) {
                foreach ($cartItem['items'] as $item) {
                    $quantity = $item['quantity'];
                    $product_variant_id = $item['variant_id'];
                    $product_id = $item['product_id'];
                    $itemPrice = $item['product']['price'];
                    $price = $quantity * $itemPrice;
                    $discounted_price = $price;
                    $order_item_description = $item['item_description'];
                    $orderitems = OrderItems::create(compact('order_id', 'product_variant_id', 'quantity', 'product_id', 'price', 'discounted_price', 'order_item_description'));
                }
            }
            if ($main_cart != null) {
                $main_cart->delete();
            }
            $orderDetails = Order::with('items.variant', 'items.product')->where('id', $order_id)->get()->first()->toArray();

            $orderMessage = $this->getOrderDetailMesage($orderDetails);
            $this->whatsappMessage($orderMessage);
        } catch (Exception $e) {
            return redirect('checkout')->with('error', 'something went wrong');
        }
        return redirect('')->with('status', 'Order Placed Successfully');
    }

    function whatsappMessage($message)
    {
        $url = env('WHATSAPP_URL');
        $phone = env('WHATSAPP_PHONE');
        $key = env('WHATSAPP_APIKEY');
        $response = Http::get($url, [
            'phone' => $phone,
            'apikey' => $key,
            'text' => $message,
        ]);
    }

    function getOrderDetailMesage($orderDetails)
    {
        $baseUrl = \Helper::getBaseUrl();

        $message = "Dear Customer,\n\n";
        $message .= "Thank you for your recent order with us. Here are the details:\n\n";
        $message .= "Order ID: {$orderDetails['id']}\n";
        $message .= "Order Date: {$orderDetails['order_date']}\n";
        $message .= "Status: {$orderDetails['status']}\n\n";
        $message .= "Customer Information:\n";
        $message .= "Name: {$orderDetails['customer_name']} {$orderDetails['customer_last_name']}\n";
        $message .= "Phone: {$orderDetails['customer_phone']}\n";
        $message .= "Email: {$orderDetails['customer_email']}\n";
        $message .= "Address: {$orderDetails['customer_address']}\n\n";
        $message .= "Order Summary:\n";
        $message .= "Discount: {$orderDetails['discount']}\n";
        $message .= "Total Amount: {$orderDetails['total_amount']}\n\n";
        foreach ($orderDetails['items'] as $index => $item) {
            $message .= "Item " . ($index + 1) . ":\n";
            $message .= "Product: {$item['product']['name']}\n";
            $message .= "SKU: " . $item['product']['SKU'] . ":\n";
            $message .= "Color: {$item['variant']['color']}, Size: {$item['variant']['size']}\n";
            $message .= "Quantity: {$item['quantity']}\n";
            $message .= "Unit Price: {$item['product']['price']}\n";
            $message .= "Subtotal:" . (float)$item['price'] * (float)$item['quantity']."\n";
            $message .= "link: ". $baseUrl ."product/". $item['product']['id']."\n\n";
        }
        $message .= "Best regards,\nHarmain Ajaz";

        return $message;
    }
}
