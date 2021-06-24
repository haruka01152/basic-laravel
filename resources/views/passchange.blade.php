<x-app-layout>
    @section('title', 'パスワード変更')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Password Change
        </h2>
    </x-slot>

    <div class="py-12 px-3">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <p class="text-red-600 pb-10">初回ログインです。パスワードを変更してください。</p>

            <form action="" method="post" class="mb-10">
                @csrf
                <div class="mb-5 w-2/5 text-left">
                    <label for="password" style="padding-right:4.75rem">新しいパスワード</label>
                    <input type="password" name="password">
                </div>

                <div class="mb-10 w-2/5 text-left">
                    <label for="password_confirmation" class="pr-3">新しいパスワード（確認）</label>
                    <input type="password" name="password_confirmation">
                </div>

                <input type="submit" value="変更" class="cursor-pointer text-lg text-white bg-red-400 inline-block py-2 px-8 rounded-lg shadow-md">
            </form>

            @error('password')
            <p class="text-red-600">{{$message}}</p>
            @enderror

        </div>
    </div>
</x-app-layout>