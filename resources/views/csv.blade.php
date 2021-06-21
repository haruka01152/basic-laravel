<x-app-layout>
    @section('title', 'CSVダウンロード')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            CSV Download
        </h2>
    </x-slot>
    <div class="bg-white border-t border-b border-solid border-gray-300 shadow-lg hidden sm:block">
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
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1 class="p-3">hello,this is the csv page.</h1>
            </div>

            <div class="mt-10 text-center">
                <a class="inline-block py-3 px-5 bg-white shadow-xl rounded-lg border border-solid border-gray-800" href="{{route('home')}}"><i class="fas fa-arrow-circle-left fa-lg text-gray-700"></i>　ホームへ戻る</a>
            </div>
        </div>
    </div>
</x-app-layout>