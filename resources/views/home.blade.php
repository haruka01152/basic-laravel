<x-app-layout>
    @section('title', 'ホーム')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Home
        </h2>
    </x-slot>

    <div class="py-12 px-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>

            <div class="mt-24 bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <div class="border rounded-lg border-gray-400 p-10">
                    <h3 class="text-lg text-blue-600 mb-5 pb-2 border-b-2 border-blue-600 border-dotted"><i class="fas fa-cubes fa-lg"></i>　{{Auth::user()->name}}さんの権限は　【{{Auth::user()->authorities->name}}】　です</h3>
                    <p class="leading-6 pb-5 text-sm">こちらは社内在庫管理用システムです。
                    <p class="leading-6 text-sm">
                        【閲覧者】　在庫リスト・商品変更履歴の閲覧、在庫リストのダウンロードが可能です。<br>
                        【編集者】　在庫リスト・商品変更履歴の閲覧/編集、在庫リストのダウンロードが可能です。<br>
                        【管理者】　在庫リスト・商品変更履歴の閲覧/編集、在庫リストのダウンロード、ユーザー管理が可能です。</p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>