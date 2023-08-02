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
        <form action="" method="GET">
            @csrf
            <input type="text" name="keyword" value="">
            <input type="submit" value="検索">
        </form>

    </header>

    <main>
        <div class="grid-container">
            <div class="sidemenu">
                @include('layouts.sidemenu')
            </div>    

            <div class="main-content">
                @yield("content")
            </div> 
        </div>
    </main>

</body>

</html>