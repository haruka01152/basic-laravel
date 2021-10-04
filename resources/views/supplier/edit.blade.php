<!-- CSS -->
<style>
    td {
        padding: .5rem 1rem;
    }

    tbody {
        width: 100%;
        display: table;
    }

    .logs,
    .logs th,
    .logs td {
        padding: .5rem 1rem;
        border: 1px solid rgba(107, 114, 128);
        text-align: center;
        padding: 0;
    }

    .logs th {
        padding: .7rem 1.5rem;
        background-color: rgba(209, 213, 219);
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


    .error {
        color: red;
    }
</style>

<x-app-layout>
    @section('title', '仕入先編集')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Supplier List　/　Edit
        </h2>
    </x-slot>
    <x-mainmenu></x-mainmenu>

    <div class="py-12 px-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-10 overflow-hidden shadow-xl sm:rounded-lg">
                <h3 class="text-lg">Supplier ID :　{{$supplier->id}}</h3>

                <form action="" method="post" class="text-center">
                    @csrf

                    <div class="py-16 flex flex-col lg:flex-row justify-center">
                        <div class="flex flex-col py-3 lg:py-0 lg:flex-row items-center">
                            <label for="name">仕入先名</label>
                            <input type="text" name="name" value="{{$supplier->name}}" class="lg:ml-2 lg:mr-7 w-full md:w-3/4 lg:w-auto">
                        </div>
                    </div>

                    <input type="submit" value="更新" class="cursor-pointer text-lg text-white bg-red-400 inline-block w-2/4 lg:w-24 h-12 lg:h-10 rounded-lg shadow-md">
                </form>

                <div class="text-right mt-10 lg:mt-0">
                <form action="{{route('supplier.display', ['id' => request('id')])}}" method="post">
                @csrf
                    @if($supplier->display == 0)
                    <input type="submit" value="この仕入先を非表示にする" class="cursor-pointer bg-white text-red-500 border-b border-red-500">
                    <input type="hidden" name="display" value="1">
                    @else
                    <input type="submit" value="この仕入先を表示する" class="cursor-pointer bg-white text-red-500 border-b border-red-500">
                    <input type="hidden" name="display" value="0">
                    @endif
                    </form>

                    <a href="{{route('supplier.delete', ['id' => request('id')])}}" class="text-red-500 border-b border-red-500">×　この仕入先を削除する</a>
                </div>

                @error('name')
                <p class="error">{{$message}}</p>
                @enderror

            </div>

            <div class="bg-white p-10 overflow-hidden shadow-xl sm:rounded-lg mt-10 ">
                <h3 class="text-lg">この仕入先の商品</h3>

                @if(count($items) > 0)
                <table class="logs m-auto my-10 block overflow-x-scroll whitespace-nowrap">
                    <tr>
                    <th>ID</th>
                    <th>商品名</th>
                        <th>価格</th>
                        <th>数量</th>
                        <th>在庫合計額</th>
                        <th>最終編集者</th>
                        <th>最終更新日時</th>
                    </tr>
                    @foreach($items as $item)
                    <tr>
                    <td><a class="td-link" href="{{route('index.edit', ['id' => $item->id])}}">{{$item->id}}</a></td>
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
                    {{$items->links()}}
                </div>
                @else

                <div class="py-10 text-center">
                    <p>データがありません。</p>
                </div>

                @endif
            </div>

            <div class="mt-10 text-center">
            <a class="inline-block py-3 px-5 bg-white shadow-xl rounded-lg border border-solid border-gray-800" href="{{route('supplier.index')}}"><i class="fas fa-arrow-circle-left fa-lg text-gray-700"></i>　仕入先リストへ戻る</a>
            </div>
        </div>
    </div>
</x-app-layout>