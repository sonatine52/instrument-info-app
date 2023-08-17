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
        <div class="flexbox-container">
            <h1 class="flexbox-item">@yield("header")</h1>
            {{-- <h1 class="display-inline">@yield("header")</h1> --}}
            
            {{-- 検索機能 --}}
            <form action="" method="GET" class="flexbox-item">
                {{-- <form action="" method="GET" class="display-inline"> --}}
                    @csrf
                    <input type="text" name="keyword" value="" >
                    <input type="submit" value="検索">
            </form>
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
</body>

</html>