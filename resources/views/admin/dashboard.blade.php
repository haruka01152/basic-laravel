<!-- テーブルのCSS -->
<style>
    table,
    th,
    td {
        border: 1px solid rgba(107, 114, 128, 1);
        text-align: center;
        padding: 0;
    }

    tbody {
        width: 100%;
        display: table;
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
    @section('title', '管理画面')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <x-mainmenu></x-mainmenu>

    <div class="py-12 px-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-10 bg-white py-10 px-5 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col justify-start lg:flex-row items-start lg:items-center">
                    <a href="{{route('admin.add')}}" class="cursor-pointer text-lg text-white bg-red-400 inline-block py-2 px-4 rounded-lg shadow-md">新規作成</a>

                    <form class="mb-0 mt-8 lg:mt-0 lg:ml-10 flex lg:items-center flex-col md:flex-row w-full lg:w-auto">

                        @csrf
                        <i class="fas fa-search fa-lg mr-2 mt-0 md:mt-4 lg:mt-0"></i>
                        <input type="text" name="email" value="{{request('email')}}" placeholder="メールアドレスを検索" class="mt-3 md:mt-0">

                        <select name="authority" class="mt-3 md:ml-5 md:mt-0">
                            <option value="">選択してください</option>
                            @foreach($authorities as $authority)
                            <option value="{{$authority->id}}">{{$authority->name}}</option>
                            @endforeach
                        </select>

                        <input type="submit" value="検索" class="py-2 px-3 md:ml-5 border border-gray-400 mt-3 ml-0 md:mt-0">
                    </form>
                </div>
            </div>

            <div class="bg-white py-10 px-5 overflow-hidden shadow-xl sm:rounded-lg">

                @if(count($users) > 0)
                <table class="m-auto block overflow-x-scroll whitespace-nowrap w-full">
                    <tr>
                        <th>ID</th>
                        <th>ユーザー名</th>
                        <th>メールアドレス</th>
                        <th>権限設定</th>
                        <th>作成日</th>
                        <th>更新日</th>
                    </tr>
                    @foreach($users as $user)
                    <tr>
                        <td><a class="td-link" href="{{route('admin.edit', ['id' => $user->id])}}">{{$user->id}}</a></td>
                        <td><a class="td-link" href="{{route('admin.edit', ['id' => $user->id])}}">{{$user->name}}</a></td>
                        <td><a class="td-link" href="{{route('admin.edit', ['id' => $user->id])}}">{{$user->email}}</a></td>
                        <td><a class="td-link" href="{{route('admin.edit', ['id' => $user->id])}}">{{$user->authorities->name}}</a></td>
                        <td><a class="td-link" href="{{route('admin.edit', ['id' => $user->id])}}">{{$user->created_at}}</a></td>
                        <td><a class="td-link" href="{{route('admin.edit', ['id' => $user->id])}}">{{$user->updated_at}}</a></td>
                    </tr>
                    @endforeach
                </table>

                <div class="mt-5 md:mt-0">
                {{$users->links()}}
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