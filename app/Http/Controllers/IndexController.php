<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\Maker;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;

class IndexController extends Controller
{
    
    public function index()
    {
        $items = Product::all();
        return view('index.index', compact('items'));
    }

    public function edit(Request $request)
    {
        $item = Product::findOrFail($request->id);
        $makers = Maker::all();
        return view('index.edit', compact('item', 'makers'));
    }

    public function update(ProductRequest $request)
    {
        Product::where('id', $request->id)->update(['maker_id' => $request->maker, 'name' => $request->product_name, 'price' => $request->price, 'quantity' => $request->quantity, 'last_editor' => Auth::id()]);

        return view('index.update');
    }

}
