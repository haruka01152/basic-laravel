<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\Maker;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\IndexRequest;

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
        $logs = Log::where('product_id', $request->id)->orderBy('updated_at', 'desc')->take(10)->get();
        return view('index.edit', compact('item', 'makers', 'logs'));
    }

    public function update(IndexRequest $request)
    {
        $id = $request->id;

        // 商品リストに登録
        Product::where('id', $request->id)->update(['maker_id' => $request->maker, 'name' => $request->product_name, 'price' => $request->price, 'quantity' => $request->quantity, 'last_editor' => Auth::id()]);

        // ログに登録
        $contents = '仕入先 => ' . $request->maker_name . ',　商品名 => ' . $request->product_name . ',　価格 => ￥' . number_format($request->price) . ',　数量 => ' . $request->quantity;
        Log::create(['product_id' => $request->id, 'editor' => Auth::id(), 'contents' => $contents]);

        return view('index.update', compact('id'));
    }

}
