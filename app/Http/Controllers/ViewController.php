<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Order;

class ViewController extends Controller {
    /**
     * Returns the home view.
     */
    public function getHomeView() {
        return view('home');
    }

    /**
     * Returns the products view with refreshed data.
     */
    public function getProductsView() {
        $products = Product::all();
        return view('products', compact('products'));
    }

    /**
     * Returns the orders view with refreshed data.
     */
    public function getOrderView() {
        $orders = Order::join('products', 'products.id', '=', 'orders.productId')
            ->get(['orders.*', 'products.name', 'products.price']);
        $totalAmount = Order::sum('amount');

        return view('order', compact('orders', 'totalAmount'));
    }

    /**
     * Inserts a new product with the given data.
     * Then refreshes/loads the products view.
     */
    public function postProduct(Request $request) {
        $product = new Product();
        $product->name = $request->input('product-name');
        $product->price = $request->input('product-price');
        $product->save();

        $products = Product::all();
        return view('products', compact('products'));
    }

    /**
     * Insets a new order line with the given data.
     * Then refreshes/loads the orders view.
     */
    public function postOrder(Request $request) {
        $order = new Order();
        $order->productId = $request->input("product-id");
        $order->quantity = 1;
        $order->amount = $order->quantity * $request->input("product-price");
        $order->save();

        $orders = Order::join('products', 'products.id', '=', 'orders.productId')
            ->get(['orders.*', 'products.name', 'products.price']);
        $totalAmount = Order::sum('amount');

        return view('order', compact('orders', 'totalAmount'));
    }

    /**
     * Updates the quantity of a given order line,
     * if the new quantity is 0 the record is deleted.
     */
    public function updateOrderQuantity(Request $request) {
        $id = $request->input('order-id');
        $quantity = $request->input('order-quantity');
        $price = $request->input('product-price');

        if ($quantity > 0) {
            DB::table('orders')
                ->where('id', $id)
                ->update([
                    'quantity'=>$quantity,
                    'amount'=>$price * $quantity
                ]);
        } else {
            DB::table('orders')
                ->where('id', $id)
                ->delete();
        }

        $orders = Order::join('products', 'products.id', '=', 'orders.productId')
            ->get(['orders.*', 'products.name', 'products.price']);
        $totalAmount = Order::sum('amount');

        return view('order', compact('orders', 'totalAmount'));
    }
}
