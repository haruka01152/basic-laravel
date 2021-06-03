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

    public function index(Request $request)
    {
        $makers = Maker::all();

        if ($request['sort'] === 'updated_at') {

            $items = Product::orderBy('updated_at', 'desc')->paginate(10);

        } else {

            $items = Product::orderBy('maker_id', 'asc')->where(function ($query) {
                if($maker = request('maker')){
                    $query->where('maker_id', $maker);
                }

                if ($find = request('find')) {
                    $query->where('name', 'LIKE', "%{$find}%");
                }
            })->paginate(10);

        }

        return view('index.index', compact('items','makers'));
        
    }

    public function sort(Request $request)
    {
        if ($request['order'] === 'updated_at') {
            $items = Product::orderBy('updated_at', 'desc')->paginate(10);
        } else {
            $items = Product::orderBy('maker_id', 'asc')->paginate(10);
        }
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
        Log::create([
            'product_id' => $latest->id,
            'editor' => Auth::id(),
            'maker' =>  $request->maker,
            'product_name' => $request->product_name,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

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
        Product::where('id', $id)->update(['maker_id' => $request->maker, 'name' => $request->product_name, 'price' => $request->price, 'quantity' => $request->quantity, 'last_editor' => Auth::id()]);

        // ログを作成
        $old = Log::where('product_id', $id)->orderBy('id', 'desc')->first(); //更新される前のログの内容を取得

        $new = Product::find($id); //更新後の商品情報を取得

        if (isset($old)) {
            if ($old->maker != $new->maker_id || $old->product_name != $new->name || $old->price != $new->price || $old->quantity != $new->quantity) {
                Log::create([
                    'product_id' => $request->id,
                    'editor' => Auth::id(),
                    'maker' =>  $request->maker,
                    'product_name' => $request->product_name,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
                ]);

                return view('index.update', compact('id'));
            } else {
                return view('index.notupdate', compact('id'));
            }
        } else {
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
}
