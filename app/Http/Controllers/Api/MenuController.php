<?php

namespace App\Http\Controllers\Api;

use App\Menu;
use App\Place;

class MenuController
{
    /**
     * @param Place $place
     * @return \Illuminate\Http\JsonResponse
     */
    public function menus(Place $place)
    {
        $menu = Menu::with('product')->where('place_id', $place->id)->get();

        return response()->json($menu);
    }
}
