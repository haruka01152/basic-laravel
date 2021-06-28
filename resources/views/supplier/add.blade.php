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
            Supplier List　/　Add
        </h2>
    </x-slot>
    <x-mainmenu></x-mainmenu>
    
    <div class="py-12 px-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-10 overflow-hidden shadow-xl sm:rounded-lg">
                <form action="" method="post" class="text-center">
                    @csrf

                    <div class="py-16 flex flex-col lg:flex-row justify-center">
                        <div class="flex flex-col py-3 lg:py-0 lg:flex-row items-center">
                            <label for="name">仕入先名</label>
                            <input type="text" name="name" value="{{old('name')}}" class="w-full md:w-3/4 lg:w-auto lg:ml-2 lg:mr-16">
                        </div>
                    </div>

                    <input type="submit" value="作成" class="cursor-pointer text-lg text-white bg-red-400 inline-block w-2/4 lg:w-24 h-12 lg:h-10 rounded-lg shadow-md">
                </form>

                @error('name')
                <p class="error">{{$message}}</p>
                @enderror
            </div>

            <div class="mt-10 text-center">
                <a class="inline-block py-3 px-5 bg-white shadow-xl rounded-lg border border-solid border-gray-800" href="{{route('supplier.index')}}"><i class="fas fa-arrow-circle-left fa-lg text-gray-700"></i>　一覧へ戻る</a>
            </div>
        </div>
    </div>
</x-app-layout>