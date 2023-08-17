<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者画面</title>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}" >
</head>

<body>
    <header>
        <h1 class="display-inline">管理者メニュー</h1>
        {{-- <p class="display-inline">{{ Auth::user()->name }}</p> --}}
        <div class="display-inline">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <button>{{ __('Logout') }}</button>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </header>

    <main>
        <div class="admin-menu">
            <a href="{{ route('admin.instruments.index') }}">楽器編集</a>
            <a href="{{ route('admin.accessories.index') }}">周辺機器編集</a>
            <a href="">商品編集</a>
            <a href="{{ route('admin.categories.index') }}">カテゴリ編集</a>
            <a href="">グレード編集</a>
        </div>
    </main>
</body>

</html>