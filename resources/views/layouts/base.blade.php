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
            {{-- サイドメニューは部品化 @include('layouts.sidemenu') --}}
            {{-- layouts.sidemenuファイル作る --}}
            <div class="sidemenu">
                <h2>カテゴリ</h2>
                <ul>
                    <li><a href="{{ route('top.index') }}">トップページ</a></li>

                    {{-- DBのinstrumentsテーブルのcategory_nameカラム=(管楽器)のnameを表示する --}}
                    {{-- (楽器1)をクリックしたときに、DBのaccessoriesテーブルのinstruments_nameカラム=(楽器1)のnameを開閉表示する --}}

                    <li><a href="">管楽器</a>
                        <ul>
                            <li><a href="" >楽器1</a>
                                <ul>
                                    <li><a href="" >周辺機器</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    {{-- DBのinstrumentsテーブルのcategory_nameカラム=(弦楽器)のnameを表示する --}}
                    {{-- (楽器2)をクリックしたときに、DBのaccessoriesテーブルのinstruments_nameカラム=(楽器2)のnameを開閉表示する --}}

                    <li><a href="">弦楽器</a>
                        <ul>
                            <li><a href="" >楽器2</a>
                                <ul>
                                    <li><a href="" >周辺機器</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    {{-- DBのinstrumentsテーブルのcategory_nameカラム=(打楽器)のnameを表示する --}}
                    {{-- (楽器3)をクリックしたときに、DBのaccessoriesテーブルのinstruments_nameカラム=(楽器3)のnameを開閉表示する --}}

                    <li><a href="">打楽器</a>
                        <ul>
                            <li><a href="" >楽器3</a>
                                <ul>
                                    <li><a href="" >周辺機器</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    {{-- DBのinstrumentsテーブルのcategory_nameカラム=(電子楽器)のnameを表示する --}}
                    {{-- (楽器4)をクリックしたときに、DBのaccessoriesテーブルのinstruments_nameカラム=(楽器4)のnameを開閉表示する --}}

                    <li><a href="">電子楽器</a>
                        <ul>
                            <li><a href="" >楽器4</a>
                                <ul>
                                    <li><a href="" >周辺機器</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>    

        {{-- サイドメニューここまで --}}

            <div class="main-content">
                @yield("content")
            </div> 
        </div>

        {{-- レイアウトはbootstrap？インストールしてない --}}

    </main>
</body>

</html>