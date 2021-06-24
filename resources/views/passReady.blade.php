<x-app-layout>
    @section('title', 'パスワード変更完了')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Password　/　Update
        </h2>
    </x-slot>

    <div class="py-12 px-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-10 overflow-hidden shadow-xl sm:rounded-lg text-center">
                <h3 class="text-lg">パスワード変更が完了しました。</h3>
            </div>

            <div class="mt-10 text-center">
                <a class="cursor-pointer text-lg text-white bg-red-400 inline-block py-2 px-4 rounded-lg shadow-md" href="{{route('login')}}">ログイン画面へ</a>
            </div>
        </div>
    </div>
</x-app-layout>