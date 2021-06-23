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
    <x-mainmenu></x-mainmenu>
    
    <div class="py-12 px-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-10 overflow-hidden shadow-xl sm:rounded-lg">
                <p>ここは管理者専用ダッシュボードです。</p>

            </div>

            <div class="mt-10 text-center">
                <a class="inline-block py-3 px-5 bg-white shadow-xl rounded-lg border border-solid border-gray-800" href="{{route('home')}}">ホームへ戻る</a>
            </div>
        </div>
    </div>
</x-app-layout>