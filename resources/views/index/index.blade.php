<!-- テーブルのCSS -->
<style>
    table,
    th,
    td {
        border: 1px solid rgba(107, 114, 128, 1);
        text-align: center;
        padding: 0;
    }
    th{
        cursor:default;
        background-color: rgba(209, 213, 219, .7);
    }
    tr{
        cursor:pointer;
    }
    tr:hover{
        background-color: rgba(243, 244, 246, 1);
    }
    th,.td-link{
        padding: .7rem 2rem;
    }
    .td-link{
        display: inline-block;
        width:100%;
        height:100%;
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
            <div class="bg-white py-10 px-5 overflow-hidden shadow-xl sm:rounded-lg">
                <table class="m-auto block overflow-x-scroll whitespace-nowrap lg:overflow-auto lg:table">
                    <tr>
                        <th>仕入先</th>
                        <th>商品名</th>
                        <th>価格</th>
                        <th>数量</th>
                        <th>在庫合計額</th>
                        <th>最終編集者</th>
                    </tr>
                    @foreach($items as $item)
                    <tr>
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $item->id])}}">{{$item->makers->name}}</a></td>
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $item->id])}}">{{$item->name}}</a></td>
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $item->id])}}">￥{{number_format($item->price)}}</a></td>
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $item->id])}}">{{$item->quantity}}</a></td>
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $item->id])}}">￥{{number_format($item->price * $item->quantity)}}</a></td>
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $item->id])}}">{{$item->users->name}}</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>

            <div class="mt-10 text-center">
                <a class="inline-block py-3 px-5 bg-white shadow-xl rounded-lg border border-solid border-gray-800" href="{{route('home')}}"><i class="fas fa-arrow-circle-left fa-lg text-gray-700"></i>　ホームへ戻る</a>
            </div>
        </div>
    </div>
</x-app-layout>