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
        return view('owner.order',compact('orders'));
    }
}
