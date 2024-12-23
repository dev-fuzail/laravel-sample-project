<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function home(){
        $categories = Category::all();
        return view('welcome', compact('categories'));
    }
    public function Fashion(){
        $categories = Category::all();
        $title = "Fashion";
        return view("fashion", compact('title', 'categories'));
    }
    public function Electronic(){
        $categories = Category::all();
        $title = "Electronics";
        return view("electronic", compact('title', 'categories'));
    }
    public function Jewellery(){
        $categories = Category::all();
        $title = "Jewellery";
        return view("jewellery", compact('title', 'categories'));
    }
    public function About(){
        $categories = Category::all();
        $title = "About Us";
        return view("about", compact('title', 'categories'));
    }
    public function Products(){
        $categories = Category::all();
        $title = "Products";
        $products = Product::paginate(12);
        return view("products", compact('title', 'products', 'categories'));
    }

    public function search(Request $request){
        $search = $request->input('value');
        $products = Product::where('product_name', 'like', '%' . $search . '%')
            ->when($request->category, function($query) use ($request) {
                return $query->where('category_id', $request->category);
            })
            ->limit(10)
            ->get(['id', 'product_name', 'image_link']);

        return response()->json([
            'products' => $products
        ]);
    }

    public function product_detail($id) {
        $categories = Category::all();
        $title = "Product Detail";
        $product = Product::findOrFail($id);
        return view('product_detail', compact('product', 'categories', 'title'));
    }

    public function add_to_cart(Request $request)
    {
//        dd($request);
        if (Auth::user()){
            Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $request['product_id']
            ]);
            return response()->json(['status' => 'success', 'message' => 'Added to cart.']);
        }
        return response()->json(['status' => 'error', 'message' => 'You need to login first.']);
    }

    public function cart_details()
    {
        $products = Cart::with('product')
            ->where('user_id', \auth()->user()->id)
            ->get();
        return ['cart' => $products];
    }

    public function remove_from_cart(Request $request)
    {
        $cartItemId = $request->cart_item_id;
        $cartItem = Cart::where('id', $cartItemId)->where('user_id', auth()->id())->first();
        if ($cartItem) {
            $cartItem->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Item not found']);
    }

    public function place_order(Request $request)
    {
        $user = auth()->user();
        $cartItemIds = $request->input('selected_items');

        $cartItems = Cart::whereIn('id', $cartItemIds)->where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'No valid items selected']);
        }

        foreach ($cartItems as $cartItem) {
            $order = Order::create([
                'user_id' => $user->id,
                'product_id' => $cartItem->product_id,
                'status' => 1
            ]);

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => 1,
                'price' => $cartItem->product->price,
            ]);
        }
        Cart::whereIn('id', $cartItemIds)->delete();

        return response()->json(['success' => true, 'message' => 'Order placed successfully']);
    }

    public function get_orders(Request $request)
    {
        $user = auth()->user();

        $orders = Order::with('order_price', 'product')
            ->where('user_id', $user->id)->get();
        return response()->json(['orders' => $orders]);
    }

    public function cancel_order(Request $request)
    {
        $orderId = $request->input('order_id');
        $user = auth()->user();

        $order = Order::where('id', $orderId)->where('user_id', $user->id)->first();

        if (!$order) {
            return response()->json(['success' => false, 'message' => 'Order not found']);
        }

        $order->delete();

        return response()->json(['success' => true, 'message' => 'Order canceled successfully']);
    }
}
