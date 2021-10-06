<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\User;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    //

    public function log(Request $request)
    {
        // ユーザーがログ画面を表示した時、半年以上前のログを削除
        $month = Carbon::today()->subMonth(6);
        $log = Log::whereDate('created_at', '<=', $month)->delete();

        $products = Product::pluck('id')->toArray();
        $users = User::where('authority', '!=', 3)->where('name', '!=', 'テスト')->get();

        $nonpage_logs = Log::where(function ($query) {
            if ($user = request('user')) {
                $query->where('editor', $user);
            }
        })->orderBy('updated_at', 'desc');

        $all_logs = $nonpage_logs->count();
        $logs = $nonpage_logs->paginate(30);

        // 何も入力せず検索したら最初のログ画面にリダイレクト
        if (isset($request['user']) && $request['user'] == '') {
            return redirect()->route('log');
        }

        return view('log', compact('products', 'users', 'logs', 'all_logs'));
    }

    public function csv()
    {
        return view('csv');
    }

    public function download(Request $request)
    {
        $suppliers = Supplier::all();
        $products = Product::orderBy('supplier_id', 'asc')->get();

        $csvList = [['仕入先', '商品名', '価格', '数量']];

        foreach ($products as $product) :
            $csvList[] = [
                $product->suppliers->name, $product->name, $product->price, $product->quantity
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

    public function downloadTemp()
    {
        // 出力データを用意
        $csvHeader = ['仕入先', '商品名', '価格', '数量'];

        // 出力データをカンマ区切りでセット
        $downloadData = implode(',', $csvHeader);

        // Excel対応
        $downloadData = mb_convert_encoding($downloadData, "SJIS", "UTF-8");

        // 一時的にcsvファイルを作成
        if (!file_exists(storage_path('csv'))) {
            $bool = mkdir(storage_path('csv'));

            // ディレクトリ作成失敗時に例外を投げる
            if (!$bool) {
                throw new \Exception("ディレクトリを作成できませんでした。");
            }
        }
        $name = 'template.csv';
        $pathToFile = storage_path('csv/' . $name);

        // CSVファイルを作成
        if (!file_put_contents($pathToFile, $downloadData)) {
            throw new \Exception("ファイルの書き込みに失敗しました。");
        }

        // ダウンロードレスポンス
        return response()->download($pathToFile, $name)->deleteFileAfterSend(true);
    }

    public function importPage()
    {
        return view('import');
    }

    public function import(Request $request)
    {
        // $this->csv->importCsv($request);
        return redirect()->route('csv');
    }

    public function mypage(Request $request)
    {
        return view('mypage', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }
}
