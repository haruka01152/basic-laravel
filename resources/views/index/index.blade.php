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
                <h1 class="p-3">hello,this is the index page.</h1>

                <table>
                    <tr>
                        <th>メーカー</th>
                        <th>名前</th>
                        <th>価格</th>
                        <th>数量</th>
                        <th>在庫合計額</th>
                        <th>最終編集者</th>
                    </tr>
                    @foreach($items as $item)
                    <tr>
                        <th>@if(!empty($item->makers->name)){{$item->makers->name}}@endif</th>
                        <th>{{$item->name}}</th>
                        <th>￥{{number_format($item->price)}}</th>
                        <th>{{$item->quantity}}</th>
                        <th>￥{{number_format($item->price * $item->quantity)}}</th>
                        <th>@if(!empty($item->users->name)){{$item->users->name}}@endif</th>
                    </tr>
                    @endforeach
                </table>
            </div>

            <div class="mt-10 text-center">
                <a class="inline-block py-3 px-5 bg-white shadow-xl rounded-lg border border-solid border-gray-800" href="{{route('home')}}">ホームへ戻る</a>
            </div>
        </div>
    </div>
</x-app-layout>