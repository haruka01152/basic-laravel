<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\Maker;
use App\Models\Product;

class IndexController extends Controller
{
    
    public function index()
    {
        $items = Product::all();
        return view('index.index', compact('items'));
    }

    public function edit(Request $request)
    {
        $item = Product::find($request->id);
        $makers = Maker::all();
        return view('index.edit', compact('item', 'makers'));
    }

}
