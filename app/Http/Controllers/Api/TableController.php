<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Table;

class TableController extends BaseController
{
    /**
     * @param $place_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTablesByPlaceId($place_id)
    {
        $tables = Table::where('place_id', $place_id)->get();

        return $this->sendResponse($tables->toArray(), 'Tables by place_id = ' . $place_id . ' successfully retrieved.');
    }
}