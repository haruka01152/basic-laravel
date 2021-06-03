<!-- CSS -->
<style>
    .error{
        color:red;
    }
</style>

<x-app-layout>
    @section('title', '新規作成')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Stock List　/　Add
        </h2>
    </x-slot>
    <div class="bg-white border-t border-b border-solid border-gray-300 shadow-lg">
        <div class="container flex justify-between max-w-7xl mx-auto px-4 lg:px-8">
            <a class="hover:bg-gray-200 inline-block py-3 w-48 text-center border-r border-l border-gray-300" href="{{route('home')}}">ホーム</a>
            <a class="hover:bg-gray-200 inline-block py-3 w-48 text-center border-r border-l border-gray-300" href="{{route('index')}}">在庫リスト</a>
            <a class="hover:bg-gray-200 inline-block py-3 w-48 text-center border-r border-l border-gray-300" href="{{route('log')}}">変更履歴</a>
            <a class="hover:bg-gray-200 inline-block py-3 w-48 text-center border-r border-l border-gray-300" href="{{route('csv')}}">CSVダウンロード</a>
            <a class="hover:bg-gray-200 inline-block py-3 w-48 text-center border-r border-l border-gray-300" href="{{route('settings')}}">設定</a>
        </div>
    </div>

    <div class="py-12 px-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-10 overflow-hidden shadow-xl sm:rounded-lg">
                <form action="" method="post" class="text-center">
                    @csrf

                    <div class="py-16 flex flex-col lg:flex-row justify-center">
                        <div class="flex flex-col py-3 lg:py-0 lg:flex-row items-center">
                            <label for="maker">仕入先</label>
                            <select name="maker" class="w-full md:w-3/4 lg:w-auto lg:ml-2 lg:mr-7">
                                @foreach($makers as $maker)
                                <option value="{{$maker->id}}" {{(old('maker')== $maker->id) ? "selected" : "" }} >{{$maker->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col py-3 lg:py-0 lg:flex-row items-center">
                            <label for="product_name">商品名</label>
                            <input type="text" name="product_name" value="{{old('product_name')}}" class="lg:ml-2 lg:mr-7 w-full md:w-3/4 lg:w-auto">
                        </div>

                        <div class="flex flex-col py-3 lg:py-0 lg:flex-row items-center">
                            <label for="price">価格</label>
                            <input type="number" name="price" value="{{old('price')}}" class="lg:ml-2 lg:mr-7 w-full md:w-3/4 lg:w-36">
                        </div>

                        <div class="flex flex-col py-3 lg:py-0 lg:flex-row items-center">
                            <label for="quantity">数量</label>
                            <input type="number" name="quantity" value="{{old('quantity')}}" class="lg:ml-2 w-full md:w-3/4 lg:w-24">
                        </div>
                    </div>

                    <input type="submit" value="作成" class="cursor-pointer text-lg text-white bg-red-400 inline-block w-2/4 lg:w-24 h-12 lg:h-10 rounded-lg shadow-md">
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

            <div class="mt-10 text-center">
                <a class="inline-block py-3 px-5 bg-white shadow-xl rounded-lg border border-solid border-gray-800" href="{{route('index')}}"><i class="fas fa-arrow-circle-left fa-lg text-gray-700"></i>　一覧へ戻る</a>
            </div>
        </div>
    </div>
</x-app-layout>