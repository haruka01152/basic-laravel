<!-- CSS -->
<style>
    td{
        padding:.5rem 1rem;
    }
    .logs,
    .logs th,
    .logs td {
        padding: .5rem 1rem;
        border: 1px solid rgba(107, 114, 128, 1);
        text-align: center;
        padding: 0;
    }
    .logs th{
        padding: .7rem 1.5rem;
    }
    .error{
        color:red;
    }
</style>

<x-app-layout>
    @section('title', '在庫リスト閲覧・編集')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Stock List　/　Edit
        </h2>
    </x-slot>

    <div class="py-12 px-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-10 overflow-hidden shadow-xl sm:rounded-lg">
                <h3 class="text-lg">Product Number :　{{$item->id}}</h3>

                <form action="" method="post" class="text-center">
                    <table class="flex justify-center my-12 pt-4 pb-8 border-solid border-gray-500 border">
                        @csrf
                        <tr>
                            <th>仕入先</th>
                            <th>商品名</th>
                            <th>価格</th>
                            <th>数量</th>
                        </tr>
                        <tr>
                            <td>
                                <select name="maker">
                                    @foreach($makers as $maker)
                                    @if($maker->name === $item->makers->name)
                                    <option value="{{$maker->id}}" selected>{{$maker->name}}</option>
                                    @else
                                    <option value="{{$maker->id}}">{{$maker->name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="text" name="product_name" value="{{$item->name}}"></td>
                            <td><input type="number" name="price" value="{{$item->price}}" style="width:150px"></td>
                            <td><input type="number" name="quantity" value="{{$item->quantity}}" style="width:100px;"></td>
                        </tr>
                    </table>

                    <input type="submit" value="更新" class="cursor-pointer text-lg text-white bg-red-400 inline-block w-24 h-10 rounded-lg">
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

            <div class="bg-white p-10 overflow-hidden shadow-xl sm:rounded-lg mt-10">
                <h3 class="text-lg">変更履歴</h3>

                <table class="logs m-auto my-10">
                    <tr>
                        <th>更新者</th>
                        <th>更新日時</th>
                    </tr>
                    @foreach($logs as $log)
                    <tr>
                        <th>{{$log->products->users->name}}</th>
                        <th>{{$log->updated_at}}</th>
                    </tr>
                    @endforeach
                </table>
            </div>

            <div class="mt-10 text-center">
                <a class="inline-block py-3 px-5 bg-white shadow-xl rounded-lg border border-solid border-gray-800" href="{{route('index')}}"><i class="fas fa-arrow-circle-left fa-lg text-gray-700"></i>　一覧へ戻る</a>
            </div>
        </div>
    </div>
</x-app-layout>