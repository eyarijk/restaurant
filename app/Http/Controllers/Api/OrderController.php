<?php


namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Order;

class OrderController
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createTableReservation(Request $request)
    {
        $data = $request->json()->all();
        $order = Order::create($data['order']);

        return response()->json($order);
    }

}