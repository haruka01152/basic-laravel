<x-app-layout>
    @section('title', '削除失敗')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Supplier List　/　NotDelete
        </h2>
    </x-slot>

    <div class="py-12 px-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-10 overflow-hidden shadow-xl sm:rounded-lg text-center">
                <h3 class="text-lg">この仕入先の商品もしくは商品変更履歴が存在するため、削除はできません。</h3>
            </div>

            <div class="mt-10 text-center">
            <a class="inline-block py-3 px-5 bg-white shadow-xl rounded-lg border border-solid border-gray-800" href="{{route('supplier.edit', ['id' => request('id')])}}"><i class="fas fa-arrow-circle-left fa-lg text-gray-700"></i>　戻る</a>
            </div>
        </div>
    </div>
</x-app-layout>