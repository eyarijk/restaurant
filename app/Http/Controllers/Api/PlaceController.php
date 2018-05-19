<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Place;


class PlaceController extends BaseController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getList()
    {
        $places = Place::all();

        return $this->sendResponse($places->toArray(), 'Places list retrieved successfully.');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPlaceById($id)
    {
        $place = Place::find($id);

        return $this->sendResponse($place, 'Single place retrieved successfully.');
    }
}