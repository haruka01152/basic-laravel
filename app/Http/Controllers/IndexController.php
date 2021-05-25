<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\Maker;
use App\Models\Product;

class IndexController extends Controller
{
    public function home()
    {
        return view('index.home');
    }

    public function index()
    {
        $items = Product::all();
        return view('index.index', compact('items'));
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
