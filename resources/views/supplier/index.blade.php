<!-- テーブルのCSS -->
<style>
    th,
    td {
        border: 1px solid rgba(107, 114, 128, 1);
        text-align: center;
        padding: 0;
    }

    tbody{
        display: table;
        width: 90%;
    }

    th {
        cursor: default;
        background-color: rgba(209, 213, 219);
    }

    tr {
        cursor: pointer;
    }

    tr:hover {
        background-color: rgba(243, 244, 246, 1);
    }

    th,
    .td-link {
        padding: .7rem 1.5rem;
    }

    .td-link {
        display: inline-block;
        width: 100%;
        height: 100%;
    }
</style>

<x-app-layout>
    @section('title', '仕入先追加・編集')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Supplier List
        </h2>
    </x-slot>

    <x-mainmenu></x-mainmenu>

    <div class="py-12 px-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-10 bg-white py-10 px-5 overflow-hidden shadow-xl sm:rounded-lg lg:flex justify-center">
                <div class="flex flex-col justify-start lg:flex-row items-start">
                    <a href="{{route('supplier.add')}}" class="cursor-pointer text-lg text-white bg-red-400 inline-block py-2 px-4 rounded-lg shadow-md mb-5 lg:mb-0">仕入先を追加</a>
                </div>

                @if(count($suppliers) > 0)
                <table class="flex justify-end w-4/5 inline-block">
                    <tr>
                        <th>ID</th>
                        <th>仕入先名</th>
                        <th>商品数</th>
                    </tr>
                    @foreach($suppliers as $supplier)
                    <tr>
                        <td><a class="td-link" href="{{route('supplier.edit', ['id' => $supplier->id])}}">{{$supplier->id}}</a></td>
                        <td><a class="td-link" href="{{route('supplier.edit', ['id' => $supplier->id])}}">{{$supplier->name}}</a></td>
                        <td><a class="td-link" href="{{route('supplier.edit', ['id' => $supplier->id])}}">{{$supplier->products->count()}}</a></td>
                    </tr>
                    @endforeach
                </table>

                <div class="mt-5 md:mt-0">
                    {{$suppliers->links()}}
                </div>

                @else

                <div class="py-10 text-center">
                    <p>データがありません。</p>
                </div>

                @endif

            </div>



            <div class="mt-10 text-center">
            <a class="inline-block py-3 px-5 bg-white shadow-xl rounded-lg border border-solid border-gray-800" href="{{route('home')}}"><i class="fas fa-arrow-circle-left fa-lg text-gray-700"></i>　ホームへ戻る</a>
            </div>
        </div>
    </div>
</x-app-layout>