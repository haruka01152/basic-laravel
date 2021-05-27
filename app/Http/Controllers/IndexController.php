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

    public function add()
    {
        $makers = Maker::all();
        return view('index.add', compact('makers'));
    }

    public function create(IndexRequest $request)
    {
        // 商品リストに追加
        Product::create(['maker_id' => $request->maker, 'name' => $request->product_name, 'price' => $request->price, 'quantity' => $request->quantity, 'last_editor' => Auth::id()]);

        // ログを作成


        $latest = Product::orderBy('id', 'desc')->first();

        return view('index.create', compact('latest'));
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

        // 商品リストを更新
        Product::where('id', $request->id)->update(['maker_id' => $request->maker, 'name' => $request->product_name, 'price' => $request->price, 'quantity' => $request->quantity, 'last_editor' => Auth::id()]);

        // ログを作成
        Log::create([
            'product_id' => $request->id,
            'editor' => Auth::id(),
            'maker' =>  $request->maker,
            'product_name' => $request->product_name,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        return view('index.update', compact('id'));
    }

}
