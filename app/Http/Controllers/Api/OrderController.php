<?php


namespace App\Http\Controllers\Api;

use App\Table;
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

        $table = Table::where('id', $data['order']['table_id'])
            ->update(['is_busy' => true]);

        return response()->json([
            'order' => $order,
            'table_id' => $table
        ]);
    }
}
