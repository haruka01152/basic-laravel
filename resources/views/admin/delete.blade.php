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
    @section('title', 'ユーザー削除')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin　/　Delete
        </h2>
    </x-slot>
    <x-mainmenu></x-mainmenu>

    <div class="py-12 px-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-10 overflow-hidden shadow-xl sm:rounded-lg">
                <h3 class="text-lg">User ID :　{{$user->id}}</h3>

                <form action="" method="post" class="text-center">
                    @csrf

                    <p>このユーザーを削除してよろしいですか？</p>
                    <div class="py-16 flex flex-col lg:flex-row justify-center">
                        <div class="flex flex-col py-3 lg:py-0 lg:flex-row items-center">
                            <label for="name">ユーザー名</label>
                            <input type="text" name="name" value="{{$user->name}}" readonly>
                        </div>

                        <div class="flex flex-col py-3 lg:py-0 lg:flex-row items-center">
                            <label for="email">メールアドレス</label>
                            <input type="text" name="email" value="{{$user->email}}" class="lg:ml-2 lg:mr-7 w-full md:w-3/4 lg:w-auto" readonly>
                        </div>

                        <div class="flex flex-col py-3 lg:py-0 lg:flex-row items-center">
                            <label for="authority">権限設定</label>
                            <select name="authority">
                            <option value="{{$authority->id}}">{{$authority->name}}</option>
                            </select>
                        </div>

                    </div>

                    <input type="submit" value="削除する" class="cursor-pointer text-lg text-white bg-red-600 inline-block w-2/4 lg:w-24 h-12 lg:h-10 rounded-lg shadow-md">
                </form>
            </div>

        <div class="text-center mt-10">
            <a class="inline-block py-3 px-5 bg-white shadow-xl rounded-lg border border-solid border-gray-800" href="{{route('admin.edit', ['id' => $user->id])}}"><i class="fas fa-arrow-circle-left fa-lg text-gray-700"></i>　戻る</a>
        </div>
        </div>
    </div>
</x-app-layout>