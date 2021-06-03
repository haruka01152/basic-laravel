<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\Maker;
use App\Models\Product;

class HomeController extends Controller
{
    //
    public function log()
    {
        $makers = Maker::all();
        $logs = Log::orderBy('updated_at', 'desc')->paginate(50);
        return view('log', compact('logs'));
    }
}
