<!-- CSS -->
<style>
    td {
        padding: .5rem 1rem;
    }

    tbody {
        width: 100%;
        display: table;
    }

    .logs,
    .logs th,
    .logs td {
        padding: .5rem 1rem;
        border: 1px solid rgba(107, 114, 128);
        text-align: center;
        padding: 0;
    }

    .logs th {
        padding: .7rem 1.5rem;
        background-color: rgba(209, 213, 219);
    }

    .logs td {
        padding: .7rem 1.5rem;
    }

    .error {
        color: red;
    }
</style>

<x-app-layout>
    @section('title', '仕入先削除')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Supplier List　/　Delete
        </h2>
    </x-slot>
    <x-mainmenu></x-mainmenu>

    <div class="py-12 px-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-10 overflow-hidden shadow-xl sm:rounded-lg">
                <h3 class="text-lg">Supplier ID :　{{$supplier->id}}</h3>

                <form action="" method="post" class="text-center">
                    @csrf

                    <p class="pt-10">この仕入先を削除してよろしいですか？</p>
                    <div class="py-16 flex flex-col lg:flex-row justify-center">
                        <div class="flex flex-col py-3 lg:py-0 lg:flex-row items-center">
                            <label for="name">仕入先名</label>
                            <input type="text" value="{{$supplier->name}}" class="w-full md:w-3/4 lg:w-auto lg:ml-2 lg:mr-7 cursor-not-allowed" readonly>
                            <input type="hidden" name="name" value="{{$supplier->id}}">
                        </div>
                    </div>

                    <input type="submit" value="削除する" class="cursor-pointer text-lg text-white bg-red-600 inline-block w-2/4 lg:w-24 h-12 lg:h-10 rounded-lg shadow-md">
                </form>
            </div>

        <div class="text-center mt-10">
            <a class="inline-block py-3 px-5 bg-white shadow-xl rounded-lg border border-solid border-gray-800" href="{{route('supplier.edit', ['id' => request('id')])}}"><i class="fas fa-arrow-circle-left fa-lg text-gray-700"></i>　戻る</a>
        </div>
        </div>
    </div>
</x-app-layout>