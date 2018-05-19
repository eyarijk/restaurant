<?php

namespace App\Http\Controllers\Owner;

use App\Place;
use App\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TablesController extends Controller
{
    public function index()
    {
        $tables = Table::all();
        return view('owner.tables.index',compact('tables'));
    }

    public function create()
    {
        $places = Place::all();
        return view('owner.tables.create',compact('places'));
    }

    public function store(Request $request)
    {
        $table = new Table();
        $table->person_size = $request->person_size;
        $table->number = $request->number;
        $table->description = $request->description;
        $table->reserve_price = $request->reserve_price * 100;
        $table->place_id = $request->place_id;
        $table->save();

        return redirect()->route('owner.tables.index');

    }
}
