<?php

namespace App\Http\Controllers\Api;

use App\Place;


class PlaceController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getList()
    {
        $places = Place::all();

        return response()->json($places->toArray());
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPlaceById($id)
    {
        $place = Place::find($id);

        return response()->json($place);
    }
}