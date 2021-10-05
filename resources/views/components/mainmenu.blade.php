@php
$menus = [
'home' => 'ホーム',
'index' => '在庫リスト',
'log' => '商品変更履歴',
'csv' => 'CSVダウンロード',
'mypage' => 'マイページ',
];
@endphp

<div class="bg-white border-t border-b border-solid border-gray-300 shadow-lg hidden sm:block">
    <div class="container flex justify-between max-w-7xl mx-auto px-4 lg:px-8">
        @foreach($menus as $key => $value)
        @if(\Route::currentRouteName() == $key)
        <a class="hover:bg-gray-200 inline-block py-3 w-48 text-center border-r border-l border-b-4 border-gray-400" href="{{route($key)}}">{{$value}}</a>
        @else
        <a class="hover:bg-gray-200 inline-block py-3 w-48 text-center border-r border-l border-gray-300" href="{{route($key)}}">{{$value}}</a>
        @endif
        @endforeach
    </div>
</div>