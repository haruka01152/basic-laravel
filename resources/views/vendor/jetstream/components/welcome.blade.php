<div class="p-8 text-center sm:px-20 bg-white border-b border-gray-200">
    <!-- <div>
        <x-jet-application-logo class="block h-12 w-auto" />
    </div> -->

    <div class="text-xl lg:text-2xl">
        在庫管理システム
    </div>

    <!-- <div class="mt-6 text-gray-500">
        Laravel Jetstream provides a beautiful, robust starting point for your next Laravel application. Laravel is designed
        to help you build your application using a development environment that is simple, powerful, and enjoyable. We believe
        you should love expressing your creativity through programming, so we have spent time carefully crafting the Laravel
        ecosystem to be a breath of fresh air. We hope you love it.
    </div> -->
</div>

<div class="text-center bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <a href="{{route('index')}}" class="p-8 lg:text-xl hover:bg-gray-200 transition ease-out duration-500">
    在庫リスト閲覧・編集
    </a>

    <a href="{{route('log')}}" class="p-8 border-t border-gray-200 md:border-t-0 md:border-l lg:text-xl hover:bg-gray-200 transition ease-out duration-500">
    変更履歴
    </a>

    <a href="{{route('csv')}}" class="p-8 border-t border-gray-200 lg:text-xl hover:bg-gray-200 transition ease-out duration-500">
    CSVダウンロード
    </a>

    <a href="{{route('mypage')}}" class="p-8 border-t border-gray-200 md:border-l lg:text-xl hover:bg-gray-200 transition ease-out duration-500">
    マイページ
    </a>
</div>
