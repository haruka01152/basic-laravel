<x-app-layout>
    @section('title', '認証エラー')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Error
        </h2>
    </x-slot>

    <div class="py-12 px-3">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white p-10 overflow-hidden shadow-xl sm:rounded-lg text-center">
                <h3 class="text-lg leading-9">この先のページへのアクセス権限がありません。<br>問題がございましたら、管理者までお問い合わせください。</h3>
            </div>

            <div class="mt-10 text-center">
                <a class="inline-block py-3 px-5 bg-white shadow-xl rounded-lg border border-solid border-gray-800" href="{{url()->previous()}}"><i class="fas fa-arrow-circle-left fa-lg text-gray-700"></i>　前ページへ戻る</a>
            </div>
        </div>
    </div>
</x-app-layout>