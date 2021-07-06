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

    <x-mainmenu></x-mainmenu>

    <div class="py-12 px-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-10 bg-white py-10 px-5 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col justify-start lg:flex-row items-start lg:items-center mb-5 lg:mb-10 lg:ml-7">
                    @if(Auth::user()->authority === 1 || Auth::user()->authority === 2)
                    <a href="{{route('index.add')}}" class="cursor-pointer text-lg text-white bg-red-400 inline-block py-2 px-4 rounded-lg shadow-md mb-5 lg:mb-0">商品を追加</a>
                    <a href="{{route('supplier.index')}}" class="text-lg text-white bg-red-400 inline-block py-2 px-4 rounded-lg shadow-md lg:ml-7">仕入先の追加・編集</a>
                    @else
                    <a class="cursor-not-allowed text-lg text-white bg-red-200 inline-block py-2 px-4 rounded-lg shadow-md mb-5 lg:mb-0">商品を追加</a>
                    <a class="cursor-not-allowed text-lg text-white bg-red-200 inline-block py-2 px-4 rounded-lg shadow-md lg:ml-7">仕入先の追加・編集</a>
                    @endif

                </div>

                <div class="lg:flex">
                    <form class="mb-0 mt-8 lg:mt-0 flex lg:items-center flex-col md:flex-row w-full lg:w-auto">

                        @csrf
                        <i class="fas fa-search fa-lg mr-2 mt-0 md:mt-4 lg:mt-0"></i>
                        <input type="text" name="find" value="{{request('find')}}" placeholder="商品名を検索" class="mt-3 md:mt-0">

                        <select name="supplier" class="mt-3 md:ml-5 md:mt-0">
                            <option value="">選択してください</option>
                            @foreach($suppliers as $supplier)
                            <option value="{{$supplier->id}}" @if(request('supplier') == $supplier->id)selected @endif>{{$supplier->name}}</option>
                            @endforeach
                        </select>

                        <input type="submit" value="検索" class="py-2 px-3 md:ml-5 border border-gray-400 mt-3 ml-0 md:mt-0">
                    </form>

                    <div class="mt-10 lg:mt-0 lg:ml-10">
                        <tr>
                            <td>@sortablelink('updated_at', '更新順に並べる')</td>
                        </tr>

                        <a href="{{route('index')}}" class="ml-5 cursor-pointer text-sm border border-gray-500 inline-block py-1 px-2">条件リセット</a>
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
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $item->id])}}">{{$item->suppliers->name}}</a></td>
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $item->id])}}">{{$item->name}}</a></td>
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $item->id])}}">￥{{number_format($item->price)}}</a></td>
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $item->id])}}">{{$item->quantity}}</a></td>
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $item->id])}}">￥{{number_format($item->price * $item->quantity)}}</a></td>
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $item->id])}}">{{$item->users->name}}</a></td>
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $item->id])}}">{{$item->updated_at}}</a></td>
                    </tr>
                    @endforeach
                </table>

                <div class="mt-5 md:mt-0">
                    {{$items->appends(request()->query())->links()}}
                </div>

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