<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\Supplier;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\IndexRequest;
use Carbon\Carbon;


class IndexController extends Controller
{

    public function index(Request $request)
    {
        $suppliers = Supplier::all();

        $nonpage_items = Product::where(function ($query) {
            if($include_zero = request('include_zero')){
                $query;
            }else{
                $query->where('quantity', '!=', 0);
            }

            if ($supplier = request('supplier')) {
                $query->where('supplier_id', $supplier);
            }

            $find = request('find');
            $query->where(function ($query) use ($find){
                if(strpos($find, ' ') || strpos($find, '　')){
                    $find = mb_convert_kana($find, 's');
                    $find = preg_split('/[\s]+/', $find, -1, PREG_SPLIT_NO_EMPTY);
                }

                if(is_array($find)){
                    foreach($find as $f){
                        $query->where('name', 'LIKE', "%{$f}%");
                    }
                }else{
                    $query->where('name', 'LIKE', "%{$find}%");
                }
            });
        })->sortable()->orderBy('supplier_id', 'asc');

        $all_items = $nonpage_items->count();
        $items = $nonpage_items->paginate(20);

        // 何も入力せず検索したら最初のindexURLにリダイレクト
        if ((isset($request['find']) && $request['find'] == '') && ($request['supplier'] == '' && $request['include_zero'] == null)) {
            return redirect()->route('index');
        }

        return view('index.index', compact('items', 'suppliers', 'all_items'));
    }

    public function add()
    {
        $suppliers = Supplier::where('display', 0)->get();
        return view('index.add', compact('suppliers'));
    }

    public function create(IndexRequest $request)
    {
        // 商品リストに追加
        Product::create(['supplier_id' => $request->supplier, 'name' => $request->product_name, 'price' => $request->price, 'quantity' => $request->quantity, 'last_editor' => Auth::id()]);

        // ログを作成
        $latest = Product::orderBy('id', 'desc')->first();
        Log::create([
            'product_id' => $latest->id,
            'editor' => Auth::id(),
            'supplier' =>  $request->supplier,
            'product_name' => $request->product_name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'action' => 1,
        ]);

        $request->session()->regenerateToken();

        return view('index.create', compact('latest'));
    }

    public function edit(Request $request, $id)
    {
        // ユーザーが編集画面を表示した時、半年以上前のログを削除
        $month = Carbon::today()->subMonth(6);
        $log = Log::whereDate('created_at', '<=', $month)->delete();

        $item = Product::findOrFail($id);
        $this_supplier = Supplier::where('id', $item->supplier_id)->first();

        if($this_supplier->display == 1){
            $suppliers = Supplier::where('display', 0)->orWhere('id', $item->supplier_id)->get();
        }else{
            $suppliers = Supplier::where('display', 0)->get();
        }

        $nonpage_logs = Log::where('product_id', $request->id)->orderBy('updated_at', 'desc');
        $all_logs = $nonpage_logs->count();
        $logs = $nonpage_logs->paginate(10);
        return view('index.edit', compact('item', 'suppliers', 'logs', 'all_logs'));
    }

    public function update(Request $request, $id)
    {
        // バリデーション
        $rules = [
            'product_name' => 'required|max:30|unique:products,name,' . $id,
            'price' => 'numeric|min:0|max:1000000|nullable',
            'quantity' => 'required|numeric|min:0|max:200',
        ];
        $this->validate($request, $rules);

        // 商品リストを更新
        Product::where('id', $id)->update(
            [
                'supplier_id' => $request->supplier,
                'name' => $request->product_name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'last_editor' => Auth::id()
            ]
        );

        // ログを作成
        $old = Log::where('product_id', $id)->orderBy('id', 'desc')->first(); //更新される前のログの内容を取得

        $new = Product::find($id); //更新後の商品情報を取得

        if (isset($old)) {
            if ($old->supplier != $new->supplier_id || $old->product_name != $new->name || $old->price != $new->price || $old->quantity != $new->quantity) {
                Log::create([
                    'product_id' => $request->id,
                    'editor' => Auth::id(),
                    'supplier' =>  $request->supplier,
                    'product_name' => $request->product_name,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
                    'action' => 2,
                ]);

                return view('index.update', compact('id'));
            } else {
                return view('index.notupdate', compact('id'));
            }
        } else {
            Log::create([
                'product_id' => $request->id,
                'editor' => Auth::id(),
                'supplier' =>  $request->supplier,
                'product_name' => $request->product_name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'action' => 2,
            ]);

            return view('index.update', compact('id'));
        }
    }

    public function delete(Request $request, $id)
    {
        $item = Product::findOrFail($request->id);
        $supplier = Supplier::findOrFail($item->suppliers->id);
        return view('index.delete', compact('item', 'supplier'));
    }

    public function destroy(Request $request, $id)
    {
        Log::create([
            'product_id' => $id,
            'editor' => Auth::id(),
            'supplier' =>  $request->supplier,
            'product_name' => $request->product_name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'action' => 3,
        ]);
        Product::where('id', $id)->delete();
        return view('index.destroy');
    }
}
