<?php

namespace App\Http\Controllers\Owner;

use App\Menu;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function create(Menu $menu)
    {
        return view('owner.products.create',compact('menu'));
    }

    public function delete($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->back();
    }
}
