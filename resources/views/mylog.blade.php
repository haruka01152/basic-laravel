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
    @section('title')
    {{Auth::user()->name}}の変更履歴
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Log
        </h2>
    </x-slot>
    <x-mainmenu></x-mainmenu>

    <div class="py-12 px-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white py-10 px-5 overflow-hidden shadow-xl sm:rounded-lg">

                @if(count($logs) > 0)
                <table class="logs m-auto my-10 block overflow-x-scroll whitespace-nowrap">
                    <tr>
                        <th>商品ID</th>
                        <th>変更後の内容</th>
                        <th>更新日時</th>
                    </tr>
                    @foreach($logs as $log)
                    <tr>
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $log->product_id])}}">{{$log->product_id}}</a></td>
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $log->product_id])}}">仕入先 => {{$log->makers->name}}, 商品名 => {{$log->product_name}}, 価格 => {{$log->price}}, 数量 => {{$log->quantity}}</a></td>
                        <td><a class="td-link" href="{{route('index.edit', ['id' => $log->product_id])}}">{{$log->updated_at}}</a></td>
                    </tr>
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