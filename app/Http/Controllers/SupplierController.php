<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\supplier;

class supplierController extends Controller
{
    //
    public function index()
    {
        $suppliers = supplier::all();
        return view('supplier.index', compact('suppliers'));
    }
}
