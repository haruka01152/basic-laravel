<x-app-layout>
    @section('title', 'マイページ')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mypage
        </h2>
    </x-slot>
    <x-mainmenu></x-mainmenu>

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

            @if(Auth::user()->authority === 0)
            <x-jet-section-border />
            <div class="mt-10 sm:mt-0">
                <x-jet-action-section>
                    <x-slot name="title">
                        ユーザー管理（管理者専用）
                    </x-slot>

                    <x-slot name="description">
                        登録しているユーザーの追加・参照・編集・削除を行います。
                    </x-slot>

                    <x-slot name="content">
                        <div class="max-w-xl text-sm text-gray-600">
                            こちらは管理者専用画面です。ユーザー管理について何かございましたら、管理者へお問い合わせください。
                        </div>
                        <div class="text-right mt-5">
                            <a href="" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">管理画面へ</a>
                        </div>
                    </x-slot>
                </x-jet-action-section>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>