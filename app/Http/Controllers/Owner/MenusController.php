<?php

namespace App\Http\Controllers\Owner;

use App\Menu;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenusController extends Controller
{
    public function index()
    {
        $menus = Menu::all();

        return view('owner.menus.index',compact('menus'));
    }

    public function show(Menu $menu)
    {
        $products = Product::where('menu_id',$menu->id)->get();

        return view('owner.menus.show',compact('menu','products'));
    }
}
