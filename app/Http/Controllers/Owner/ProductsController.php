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

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destinationPath = public_path() . '/images/products/';
            $filename = time() . '.' . $file->getClientOriginalExtension() ?: 'png';
            $request->file('image')->move($destinationPath, $filename);
        }

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $filename ? $filename : null;
        $product->price = $request->price * 100;
        $product->menu_id = $request->menu_id;
        $product->slug = str_slug($request->name);
        $product->save();

        return redirect()->route('owner.menus.show',$request->menu_id);

    }
}
