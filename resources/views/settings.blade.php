<x-app-layout>
    @section('title', '設定')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Settings
        </h2>
    </x-slot>
    <div class="bg-white border-t border-b border-solid border-gray-300 shadow-lg hidden sm:block">
        <div class="container flex justify-between max-w-7xl mx-auto px-4 lg:px-8">
            <a class="hover:bg-gray-200 inline-block py-3 w-48 text-center border-r border-l border-gray-300" href="{{route('home')}}">ホーム</a>
            <a class="hover:bg-gray-200 inline-block py-3 w-48 text-center border-r border-l border-gray-300" href="{{route('index')}}">在庫リスト</a>
            <a class="hover:bg-gray-200 inline-block py-3 w-48 text-center border-r border-l border-gray-300" href="{{route('log')}}">変更履歴</a>
            <a class="hover:bg-gray-200 inline-block py-3 w-48 text-center border-r border-l border-gray-300" href="{{route('csv')}}">CSVダウンロード</a>
            <a class="hover:bg-gray-200 inline-block py-3 w-48 text-center border-r border-l border-gray-300" href="{{route('settings')}}">設定</a>
        </div>
    </div>

    <div class="py-12 px-3">
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>