<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\Maker;
use App\Models\Product;
use Symfony\Component\HttpFoundation\StreamedResponse;

class HomeController extends Controller
{
    //
    public function log()
    {
        $makers = Maker::all();
        $logs = Log::orderBy('updated_at', 'desc')->paginate(30);
        return view('log', compact('logs'));
    }

    public function csv()
    {
        return view('csv');
    }

    public function download(Request $request)
    {
        $makers = Maker::all();
        $products = Product::orderBy('maker_id', 'asc')->get();

        $csvList = [['仕入先', '商品名', '価格', '数量']];

        foreach ($products as $product) :
            $csvList[] = [
                $product->makers->name, $product->name, $product->price, $product->quantity
            ];
        endforeach;

        $response = new StreamedResponse(function () use ($request, $csvList) {
            $stream = fopen('php://output', 'w');

            //　文字化け回避
            stream_filter_prepend($stream, 'convert.iconv.utf-8/cp932//TRANSLIT');

            // CSVデータ
            foreach ($csvList as $key => $value) {
                fputcsv($stream, $value);
            }
            fclose($stream);
        });
        $response->headers->set('Content-Type', 'application/octet-stream');
        $response->headers->set('Content-Disposition', 'attachment; filename="productlist.csv"');

        return $response;
    }

    public function settings(Request $request)
    {
        return view('settings', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }
}
