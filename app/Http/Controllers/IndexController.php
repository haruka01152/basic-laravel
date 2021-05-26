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

    public function edit(Request $id)
    {
        $item = Product::find($id);
        return view('index.edit', compact('item'));
    }

    public function log()
    {
        $items = Log::all();
        return view('index.log', compact('items'));
    }

    public function csv()
    {
        return view('index.csv');
    }

    public function settings()
    {
        return view('index.settings');
    }
}
