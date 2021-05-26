<!-- テーブルのCSS -->
<style>
    table,
    th,
    td {
        border: 1px solid rgba(107, 114, 128, 1);
        text-align: center;
    }
    th{
        cursor:default;
    }
    tr{
        cursor:pointer;
    }
    tr:hover{
        background-color: rgba(243, 244, 246, 1);
    }
    th,
    td {
        padding: .7rem 2rem;
    }
    th {
        background-color: rgba(243, 244, 246, 1);
    }
</style>

<x-app-layout>
    @section('title', '在庫リスト閲覧・編集')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Stock List
        </h2>
    </x-slot>

    <div class="py-12 px-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="m-auto my-10">
                    <tr class="p-5">
                        <th>メーカー</th>
                        <th>名前</th>
                        <th>価格</th>
                        <th>数量</th>
                        <th>在庫合計額</th>
                        <th>最終編集者</th>
                    </tr>
                    @foreach($items as $item)
                    <tr class="clickable-row" data-href="https://yahoo.co.jp">
                        <td>{{$item->makers->name}}</td>
                        <td>{{$item->name}}</td>
                        <td>￥{{number_format($item->price)}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>￥{{number_format($item->price * $item->quantity)}}</td>
                        <td>{{$item->users->name}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>

            <div class="mt-10 text-center">
                <a class="inline-block py-3 px-5 bg-white shadow-xl rounded-lg border border-solid border-gray-800" href="{{route('home')}}">ホームへ戻る</a>
            </div>
        </div>
    </div>
    <script src="{{mix('js/jquery.js')}}"></script>
</x-app-layout>