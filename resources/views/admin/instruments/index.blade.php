<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <header>
        <h1 class="display-inline">楽器一覧</h1>
        <a href="{{ route('admin') }}" class="display-inline"><button>&lt; 戻る</button></a>
    </header>

    <main>
        {{-- フラッシュメッセージ --}}
            @if (session('flash_message'))
                <p>{{ session('flash_message') }}</p>
            @endif

        {{-- 機能ボタン --}}
        <a href="{{ route('admin.instruments.create') }}"><button>新規作成</button></a>
        <a href="{{ route('admin.instruments.edit', ['id' => $instruments[0]->id]) }}" id='edit'><button>編集</button></a>
        <input type="submit" value="削除">

        {{-- モーダル --}}
        <div class="modal-back hidden">
            <div class="modal-box">
                <p>削除しますか？</p>
                <div>
                    <button type="submit" form="delete">削除</button>
                    <button id="close-modal">戻る</button>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.instruments.destroy', ['id' => $instruments[0]->id]) }}" id='delete' method="post">
            @csrf
            @method('delete')

            {{-- レコード一覧 --}}
            <table border="1">
                <tr>
                    <th></th>
                    <th>楽器名</th>
                    <th>画像</th>
                    <th>音色データ</th>
                    <th>説明</th>
                    <th>カテゴリ</th>
                </tr>
            
                @foreach($instruments as $key => $instrument)
                    <tr>
                        <td><input type="radio" name="id" value="{{ $instrument->id }}" @if($loop->first)checked @endif></td>
                        <td>{{ $instrument->name }}</td>
                        <td><img src="{{ asset(str_starts_with($instrument->img, 'images/') ? $instrument->img : 'images/'. $instrument->img) }}" alt="" width=100px></td>
                        <td></td>
                        <td>{{ $instrument->content }}</td>
                        <td>{{ $instrument->category->name }}</td>
                    </tr>
                @endforeach
            </table>
        </form> 
    </main>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>