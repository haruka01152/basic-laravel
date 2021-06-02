<!-- テーブルのCSS -->
<style>
    table,
    th,
    td {
        border: 1px solid rgba(107, 114, 128, 1);
        text-align: center;
        padding: 0;
    }

    tbody {
        width: 100%;
        display: table;
    }

    th {
        cursor: default;
        background-color: rgba(209, 213, 219);
    }

    tr {
        cursor: pointer;
    }

    tr:hover {
        background-color: rgba(243, 244, 246, 1);
    }

    th,
    .td-link {
        padding: .7rem 1.5rem;
    }

    .td-link {
        display: inline-block;
        width: 100%;
        height: 100%;
    }
</style>

<x-app-layout>
    @section('title', '在庫リスト閲覧・編集')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Stock List
        </h2>
    </x-slot>
    <div class="bg-white shadow-md border-t border-solid border-gray">
        <div class="container max-w-7xl mx-auto py-3 px-4 lg:px-8">
            <a class="pr-3 text-blue-400" href="{{route('home')}}">ホーム</a>
            <i class="fas fa-chevron-right pr-3"></i>
            <span>在庫リスト</span>
        </div>
    </div>

    <div class="py-12 px-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-10 bg-white py-10 px-5 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col justify-start lg:flex-row items-start lg:items-center">
                    <a href="{{route('index.add')}}" class="cursor-pointer text-lg text-white bg-red-400 inline-block py-2 px-4 rounded-lg shadow-md">新規作成</a>

                    <form class="mb-0 mt-8 lg:mt-0 lg:ml-10 flex items-center">

                        @csrf
                        <i class="fas fa-search fa-lg mr-2"></i>
                        <input type="text" name="find" value="{{request('find')}}" placeholder="商品名を検索">

                        <select name="maker" class="lg:ml-5">
                            <option value='' disabled selected style='display:none;'>選択してください</option>
                            @foreach($makers as $maker)
                            <option value="{{$maker->id}}" @if(request()->maker == $maker->id)selected @endif>{{$maker->name}}</option>
                            @endforeach
                        </select>

                        <input type="submit" value="検索" class="py-2 px-3 ml-5 border border-gray-400">
                    </form>

                    <div class="mt-10 lg:mt-0 lg:ml-auto lg:mr-1">
                        <a href="{{route('index', ['sort' => 'updated_at'])}}" class="cursor-pointer text-white bg-blue-500 inline-block py-2 px-4">更新順</a>

                        <a href="{{route('index')}}" class="ml-5 cursor-pointer text-sm border border-gray-500 inline-block py-1 px-2">リセット</a>
                    </div>
                </div>
            </div>

            <div class="bg-white py-10 px-5 overflow-hidden shadow-xl sm:rounded-lg">

                @if(count($items) > 0)
                <table class="m-auto block overflow-x-scroll whitespace-nowrap w-full">
                    <tr>
                        <th>仕入先</th>
                        <th>商品名</th>
                        <th>価格</th>
                        <th>数量</th>
                        <th>在庫合計額</th>
                        <th>最終編集者</th>
                        <th>最終更新日時</th>
                    </tr>
                    @foreach($items as $item)
                    <tr>
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $item->id])}}">{{$item->makers->name}}</a></td>
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $item->id])}}">{{$item->name}}</a></td>
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $item->id])}}">￥{{number_format($item->price)}}</a></td>
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $item->id])}}">{{$item->quantity}}</a></td>
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $item->id])}}">￥{{number_format($item->price * $item->quantity)}}</a></td>
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $item->id])}}">{{$item->users->name}}</a></td>
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $item->id])}}">{{$item->updated_at}}</a></td>
                    </tr>
                    @endforeach
                </table>

                {{$items->links()}}

                @else

                <div class="py-10 text-center">
                    <p>データがありません。</p>
                </div>

                @endif
            </div>

            <div class="mt-10 text-center">
                <a class="inline-block py-3 px-5 bg-white shadow-xl rounded-lg border border-solid border-gray-800" href="{{route('home')}}"><i class="fas fa-arrow-circle-left fa-lg text-gray-700"></i>　ホームへ戻る</a>
            </div>
        </div>
    </div>
</x-app-layout>