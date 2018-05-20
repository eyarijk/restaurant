<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Table;
use App\Order;
use App\Place;

class TableController
{
    /**
     * @param $place_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTablesByPlaceId($place_id)
    {
        $tables = Table::where('place_id', $place_id)->get();

        return response()->json($tables->toArray());
    }

    /**
     * @param Place $place
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOneFreeTableByPlace(Place $place, Request $request)
    {
        $data = $request->all();

        if (!array_key_exists('time', $data) || !array_key_exists('person_size', $data)) {
            $exception = new \Exception('Invalid data');

            return response()->json(['error' => $exception->getMessage()], 400);
        }

        $dateTime = $request->get('time');

        $filtered = Table::with('order')->where('place_id', $place->id)
            ->where('person_size', $data['person_size'])
            ->where('is_busy', false)
            ->first();

        return response()->json($filtered->toArray());
    }

    /**
     * @param Table $table
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkTableAvailability(Table $table, Request $request)
    {
        $params = $request->only(['time', 'person_size']);
        if (!isset($params['time'])) {
            return response()->json([], 400);
        }
        $currentOrder = Order::where('table_id', $table->id)
            ->where('time', new Carbon($params['time']))
            ->where('is_finished', false)
            ->whereHas('table', function ($query) use ($params){
                $query->where('tables.person_size', $params['person_size']);
            })
            ->first()
        ;
        if (!$currentOrder) {
            return response()->json(true);
        }

        return response()->json(false);
    }
}
