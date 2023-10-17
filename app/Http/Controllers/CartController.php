<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getCart(Request $request)
    {
        // Validate the request
        $session_id = $request->query('session_id');
        if (is_null($session_id)) {
            return response()->json(['error' => "session_id is required"]);
        }
        $sessionFilePath = storage_path('framework/sessions/' . $session_id);
        if (!file_exists($sessionFilePath)) {
            return response()->json(['error' => 'Session does not exist']);
        } else {
            $cart = Cart::with(['items.product', 'items.variant.images'])
                ->join('cart_items', 'carts.id', '=', 'cart_items.cart_id')
                ->where('carts.session_id', $session_id)
                ->groupBy('carts.id')
                ->select('carts.*')
                ->get();

            return response()->json(['message' => 'Items in cart', 'cart' => $cart, 'body' => $session_id]);
        }
    }

    public function addToCart(Request $request)
    {
        // Validate the request
        $session_id = $request->query('session_id');
        if (is_null($session_id)) {
            return response()->json(['error' => "session_id is required"]);
        }
        $sessionFilePath = storage_path('framework/sessions/' . $session_id);
        if (!file_exists($sessionFilePath)) {
            return response()->json(['error' => 'Session does not exist']);
        }
        // Parse and validate request body
        $content = $request->getContent();
        parse_str($content, $body);

        // Validate required fields
        $variantId = $body['variant_id'] ?? null;
        $quantity = $body['quantity'] ?? null;

        // Retrieve the product_id from the ProductVariant model
        $productVariant = ProductVariant::find($variantId);
        $productId = $productVariant ? $productVariant->product_id : null;

        // return response()->json(['error' => $productId]);

        if (!$productId || !$variantId || !$quantity) {
            return response()->json(['error' => 'Invalid request body']);
        }

        // Create a new Cart instance or retrieve an existing one
        $cart = Cart::where('session_id', $session_id)->first();
        if (!$cart) {
            $cart = Cart::create(['session_id' => $session_id]);
        }
        // Check if the cart item already exists
        $existingCartItem = CartItem::where('cart_id', $cart->id)
            ->where('variant_id', $variantId)
            ->first();

        if ($existingCartItem) {
            // Update the quantity if the cart item already exists
            $existingCartItem->update(['quantity' => $existingCartItem->quantity + $quantity]);
        } else {
            // Add the item to the cart if it doesn't exist
            $cartItem = CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $productId,
                'variant_id' => $variantId,
                'quantity' => $quantity,
            ]);
        }
        if ($quantity < 0) {
            return response()->json(['message' => 'Item removed from the cart', 'cart' => $cart]);
        }
        return response()->json(['message' => 'Item added to the cart', 'cart' => $cart]);


    }

    public function removeFromCart(Request $request, $cartId, $cartItemId)
    {
        // Validate the request
        $session_id = $request->query('session_id');
        if (is_null($session_id)) {
            return response()->json(['error' => "session_id is required"]);
        }
        $sessionFilePath = storage_path('framework/sessions/' . $session_id);
        if (!file_exists($sessionFilePath)) {
            return response()->json(['error' => 'Session does not exist']);
        }

        $cart = Cart::where('session_id', $session_id)->where('id', $cartId)->first();
        if (!$cart){
            return response()->json(['error' => 'error removing Item from the cart, cart id does not match Session ']);
        }

        $cartItem = CartItem::where('id', $cartItemId)
            ->where('cart_id', $cartId)
            ->first();

        // Check if the CartItem exists
        if ($cartItem) {
            // Delete the CartItem
            $cartItem->delete();

            return response()->json(['message' => 'Item removed from the cart']);
        } else {
            return response()->json(['error' => 'error removing Item from the cart']);
        }
    }

    public function updateCart(Request $request, $id)
    {

        // Add logic to handle updating cart
        return response()->json(['message' => 'Cart updated']);

    }
}
