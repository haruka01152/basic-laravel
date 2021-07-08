<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Log;

class SupplierController extends Controller
{
    //
    public function index()
    {
        $suppliers = Supplier::paginate(15);
        return view('supplier.index', compact('suppliers'));
    }

    public function add()
    {
        return view('supplier.add');
    }

    public function create(Request $request)
    {
        $rules = ['name' => 'required|max:10|unique:suppliers,name'];
        $this->validate($request, $rules);

        Supplier::create(['name' => $request->name]);
        $latest = Supplier::orderBy('id', 'desc')->first();

        return view('supplier.create', compact('latest'));
    }

    public function edit(Request $request, $id)
    {
        $supplier = Supplier::findOrFail($id);
        $items = Product::where('supplier_id', $id)->paginate(10);
        return view('supplier.edit', compact('supplier', 'items'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:10|unique:suppliers,name,' . $id,
        ];
        $this->validate($request, $rules);

        Supplier::where('id', $id)->update([
            'name' => $request->name,
        ]);
        return view('supplier.update');
    }

    public function delete(Request $request, $id)
    {
        $products = Product::where('supplier_id', $id)->get();
        $supplier = Supplier::findOrFail($id);
        $logs = Log::where('supplier', $supplier->id)->get();

        if(count($products) > 0 || count($logs) > 0){
            return view('supplier.notDelete');
        }else{
            return view('supplier.delete', compact('supplier'));
        }
    }

    public function destroy(Request $request, $id)
    {
        Supplier::where('id', $id)->delete();
        return view('supplier.destroy');
    }

    public function display(Request $request, $id)
    {
        if($request->display == 0){
            Supplier::where('id', $id)->update(['display' => 0]);
            return view('supplier.display');
        }else{
            Supplier::where('id', $id)->update(['display' => 1]);
            return view('supplier.notDisplay');
        }
    }
}
