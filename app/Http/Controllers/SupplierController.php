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
}
