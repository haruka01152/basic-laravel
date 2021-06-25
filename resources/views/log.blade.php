<!-- CSS -->
<style>
    tbody {
        width: 100%;
        display: table;
    }

    .logs,
    .logs th,
    .logs td {
        border: 1px solid rgba(107, 114, 128);
        text-align: center;
        padding: 0;
    }

    .logs th {
        padding: .7rem 1.5rem;
        background-color: rgba(209, 213, 219);
        cursor: default;
        background-color: rgba(209, 213, 219);
    }

    .logs td {
        padding: 0;
    }

    tr {
        cursor: pointer;
    }

    tr:hover {
        background-color: rgba(243, 244, 246, 1);
    }

    .td-link {
        display: inline-block;
        padding: .7rem 1.5rem;
        width: 100%;
        height: 100%;
    }
</style>

<x-app-layout>
    @section('title', '変更履歴')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Log
        </h2>
    </x-slot>
    <x-mainmenu></x-mainmenu>

    <div class="py-12 px-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white py-10 px-5 overflow-hidden shadow-xl sm:rounded-lg">

                <form class="mb-0 mt-8 lg:mt-0 flex lg:items-center flex-col md:flex-row w-full lg:w-auto">
                    @csrf
                    <select name="user" class="mt-3 md:mt-0">
                        <option value="">ユーザー別履歴を表示</option>
                        @foreach($users as $user)
                        <option value="{{$user->id}}" @if(request('user') == $user->id)selected @endif>{{$user->name}}</option>
                        @endforeach
                    </select>

                    <input type="submit" value="検索" class="py-2 px-3 md:ml-5 border border-gray-400 mt-3 ml-0 md:mt-0">

                    <p class="text-red-600 pt-5 md:pl-10 md:pt-0">※商品が削除済みの場合、編集画面への遷移はできません。<br>※履歴は1年でローテートされます（1年以上前のものは削除されていきます）。</p>
                </form>
                @if(count($logs) > 0)
                <table class="logs m-auto my-10 block overflow-x-scroll whitespace-nowrap">
                    <tr>
                        <th>商品ID</th>
                        <th>更新者</th>
                        <th>操作</th>
                        <th>記録内容（操作が【削除】の場合、削除時の内容）</th>
                        <th>更新日時</th>
                    </tr>
                    @foreach($logs as $log)

                    <!-- ログの商品が今も存在していれば、edit画面へのリンク行としてテーブルに表示 -->
                    @if(in_array($log->product_id, $products))
                    <tr>
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $log->product_id])}}">{{$log->product_id}}</a></td>
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $log->product_id])}}">{{$log->users->name}}</a></td>
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $log->product_id])}}">{{$log->actions->name}}</a></td>
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $log->product_id])}}">仕入先 => {{$log->suppliers->name}}, 商品名 => {{$log->product_name}}, 価格 => {{$log->price}}, 数量 => {{$log->quantity}}</a></td>
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $log->product_id])}}">{{$log->updated_at}}</a></td>
                    </tr>
                    @else
                    <tr class="bg-gray-300 hover:bg-gray-300 cursor-not-allowed">
                        <td><a class="td-link">{{$log->product_id}}</a></td>
                        <td><a class="td-link">{{$log->users->name}}</a></td>
                        <td><a class="td-link">{{$log->actions->name}}</a></td>
                        <td><a class="td-link">仕入先 => {{$log->suppliers->name}}, 商品名 => {{$log->product_name}}, 価格 => {{$log->price}}, 数量 => {{$log->quantity}}</a></td>
                        <td><a class="td-link">{{$log->updated_at}}</a></td>
                    </tr>
                    @endif
                    @endforeach
                </table>

                {{$logs->links()}}

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