<?php

namespace App\Http\Controllers\Owner;

use App\Menu;
use App\Place;
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

    public function create()
    {
        $places = Place::all();
        return view('owner.menus.create',compact('places'));
    }

    public function store(Request $request)
    {
        $menu = new Menu();
        $menu->title = $request->title;
        $menu->description = $request->description;
        $menu->place_id = $request->place_id;
        $menu->slug = str_slug($request->title);
        $menu->save();

        return redirect()->route('owner.menus.show',$menu->id);

    }
}
