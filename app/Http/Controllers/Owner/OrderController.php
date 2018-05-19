<?php

namespace App\Http\Controllers\Owner;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('is_finished',false)->orderBy('time','asc')->with('customer')->with('table')->with('place')->get();
        return view('owner.orders.index',compact('orders'));
    }

    public function show(Order $order)
    {
        $products = $order->products()->get();
        $productsPrice = $this->calculationProductsPrice($products);

        return view('owner.orders.order',compact('order','products','productsPrice'));
    }

    public function status(Request $request)
    {
        $order = Order::findOrFail($request->id);
        $order->is_finished = true;
        $order->save();
        return redirect()->route('owner.orders.index');
    }

    /*
     * Other methods for controller
     */

    /**
     * Get products price.
     * @param $products;
     * @return float;
     */
    private function calculationProductsPrice($products)
    {
        $total = 0;
        foreach ($products as $product)
            $total += $product->getPrice();
        return $total;
    }
}
