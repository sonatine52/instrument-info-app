<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}" >
</head>

<body>
    <header>
        <h1>@yield("header")</h1>
            
        {{-- 検索機能 --}}
        <div>
            <input type="text" name="keyword" placeholder="キーワードを入力" value="" id="keyword">
            <input type="submit" value="検索">
        </div>
    </header>

    <main>
        <div class="grid-container">
            <div class="grid-item-sidemenu">
                @include('layouts.sidemenu')
            </div>    

            <div class="grid-item-contents">
                @yield("content")
            </div> 
        </div>
    </main>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>