<x-app-layout>
    @section('title', 'パスワード変更')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Password Change
        </h2>
    </x-slot>

    <div class="py-12 px-3">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <form action="" method="post">
            @csrf
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="current_password" value="現在のパスワード" />
                    <x-jet-input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
                    <x-jet-input-error for="current_password" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="password" value="新しいパスワード" />
                    <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" />
                    <x-jet-input-error for="password" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="password_confirmation" value="新しいパスワード（確認）" />
                    <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
                    <x-jet-input-error for="password_confirmation" class="mt-2" />
                </div>

                <input type="submit" value="変更">
            </form>

        </div>
    </div>
</x-app-layout>