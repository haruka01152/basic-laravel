<x-app-layout>
    @section('title', '設定')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Settings
        </h2>
    </x-slot>

    <div class="py-12 px-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1 class="p-3">hello,this is the settings page.</h1>
            </div>

            <div class="mt-10 text-center">
                <a class="inline-block py-3 px-5 bg-white shadow-xl rounded-lg border border-solid border-gray-800" href="{{route('home')}}"><i class="fas fa-arrow-circle-left fa-lg text-gray-700"></i>　ホームへ戻る</a>
            </div>
        </div>
    </div>
</x-app-layout>