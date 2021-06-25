<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Product;

class supplierController extends Controller
{
    //
    public function index()
    {
        $suppliers = Supplier::paginate(15);
        return view('supplier.index', compact('suppliers'));
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
            'supplier_name' => 'required|max:10|unique:suppliers,' . $id,
        ];
        $this->validate($request, $rules);

        Supplier::where('id', $id)->update([
            'name' => $request->supplier_name,
        ]);
        return view('supplier.update');
    }
}
