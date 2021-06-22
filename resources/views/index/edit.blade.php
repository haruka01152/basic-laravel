<!-- CSS -->
<style>
    td {
        padding: .5rem 1rem;
    }

    tbody{
        width:100%;
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

    .logs td {
        padding: .7rem 1.5rem;
    }

    .error {
        color: red;
    }
</style>

<x-app-layout>
    @section('title', '在庫リスト閲覧・編集')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Stock List　/　Edit
        </h2>
    </x-slot>
    <x-mainmenu></x-mainmenu>

    <div class="py-12 px-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-10 overflow-hidden shadow-xl sm:rounded-lg">
                <h3 class="text-lg">Product Number :　{{$item->id}}</h3>

                <form action="" method="post" class="text-center">
                    @csrf

                    <div class="py-16 flex flex-col lg:flex-row justify-center">
                        <div class="flex flex-col py-3 lg:py-0 lg:flex-row items-center">
                            <label for="maker">仕入先</label>
                            <select name="maker" class="w-full md:w-3/4 lg:w-auto lg:ml-2 lg:mr-7">
                                @foreach($makers as $maker)
                                @if($maker->name === $item->makers->name)
                                <option value="{{$maker->id}}" selected>{{$maker->name}}</option>
                                @else
                                <option value="{{$maker->id}}">{{$maker->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col py-3 lg:py-0 lg:flex-row items-center">
                            <label for="product_name">商品名</label>
                            <input type="text" name="product_name" value="{{$item->name}}" class="lg:ml-2 lg:mr-7 w-full md:w-3/4 lg:w-auto">
                        </div>

                        <div class="flex flex-col py-3 lg:py-0 lg:flex-row items-center">
                            <label for="price">価格</label>
                            <input type="number" name="price" value="{{$item->price}}" class="lg:ml-2 lg:mr-7 w-full md:w-3/4 lg:w-36">
                        </div>

                        <div class="flex flex-col py-3 lg:py-0 lg:flex-row items-center">
                            <label for="quantity">数量</label>
                            <input type="number" name="quantity" value="{{$item->quantity}}" class="lg:ml-2 w-full md:w-3/4 lg:w-24">
                        </div>
                    </div>

                    <input type="submit" value="更新" class="cursor-pointer text-lg text-white bg-red-400 inline-block w-2/4 lg:w-24 h-12 lg:h-10 rounded-lg shadow-md">
                </form>

                @error('product_name')
                <p class="error">{{$message}}</p>
                @enderror

                @error('price')
                <p class="error">{{$message}}</p>
                @enderror

                @error('quantity')
                <p class="error">{{$message}}</p>
                @enderror

            </div>

            <div class="bg-white p-10 overflow-hidden shadow-xl sm:rounded-lg mt-10 ">
                <h3 class="text-lg">変更履歴</h3>

                @if(count($logs) > 0)
                <table class="logs m-auto my-10 block overflow-x-scroll whitespace-nowrap">
                    <tr>
                        <th>更新者</th>
                        <th>変更後の内容</th>
                        <th>更新日時</th>
                    </tr>
                    @foreach($logs as $log)
                    <tr>
                        <td>{{$log->users->name}}</td>
                        <td>仕入先 => {{$log->makers->name}}, 商品名 => {{$log->product_name}}, 価格 => {{$log->price}}, 数量 => {{$log->quantity}}</td>
                        <td>{{$log->updated_at}}</td>
                    </tr>
                    @endforeach
                </table>

                <div class="mt-5 md:mt-0">
                {{$logs->appends($params)->links()}}
                </div>
                @else

                <div class="py-10 text-center">
                    <p>データがありません。</p>
                </div>

                @endif
            </div>

            <div class="mt-10 text-center">
                @if(url()->previous() == url('index'))
                <a class="inline-block py-3 px-5 bg-white shadow-xl rounded-lg border border-solid border-gray-800" href="{{route('index')}}"><i class="fas fa-arrow-circle-left fa-lg text-gray-700"></i>　在庫リストへ戻る</a>
                @elseif(url()->previous() == url('log'))
                <a class="inline-block py-3 px-5 bg-white shadow-xl rounded-lg border border-solid border-gray-800" href="{{route('log')}}"><i class="fas fa-arrow-circle-left fa-lg text-gray-700"></i>　変更履歴へ戻る</a>
                @else
                <a class="inline-block py-3 px-5 bg-white shadow-xl rounded-lg border border-solid border-gray-800 lg:mr-5" href="{{route('index')}}">在庫リストへ</a>
                <a class="inline-block py-3 px-5 bg-white shadow-xl rounded-lg border border-solid border-gray-800 lg:ml-5" href="{{route('log')}}">変更履歴へ</a>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>