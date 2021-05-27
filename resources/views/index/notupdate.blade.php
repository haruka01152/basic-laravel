<x-app-layout>
    @section('title', '更新失敗')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Stock List　/　NotUpdate
        </h2>
    </x-slot>

    <div class="py-12 px-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-10 overflow-hidden shadow-xl sm:rounded-lg text-center">
                <h3 class="text-lg">更新に失敗しました。項目の内容に変化がありません。</h3>

                <a href="{{route('index.edit', ['id' => $id])}}" class="cursor-pointer text-lg text-white bg-red-400 inline-block mt-10 py-2 px-6 rounded-lg shadow-md">編集ページへ戻る</a>
            </div>

            <div class="mt-10 text-center">
                <a class="inline-block py-3 px-5 bg-white shadow-xl rounded-lg border border-solid border-gray-800" href="{{route('index')}}"><i class="fas fa-arrow-circle-left fa-lg text-gray-700"></i>　一覧へ戻る</a>
            </div>
        </div>
    </div>
</x-app-layout>