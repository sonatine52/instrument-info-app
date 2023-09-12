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
        <h1 class="display-inline">カテゴリ一覧</h1>
        <a href="{{ route('admin') }}" class="display-inline"><button>&lt;戻る</button></a>
    </header>

    <main>
        {{-- フラッシュメッセージ --}}
        @if (session('flash_message'))
            <p>{{ session('flash_message') }}</p>
        @endif
        
        {{-- 機能ボタン --}}
        <a href="{{ route('admin.categories.create') }}"><button>新規作成</button></a>
        <a href="{{ route('admin.categories.edit', ['id' => $categories[0]->id]) }}" id='edit'><button>編集</button></a>
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

        <form action="{{ route('admin.categories.destroy', ['id' => $categories[0]->id]) }}" id='delete' method="post">
            @csrf
            @method('delete')
            {{-- レコード一覧 --}}
            <table border="1">
                <tr>
                    <th></th>
                    <th>カテゴリ名</th>
                </tr>
                
                @foreach ($categories as $category)
                    <tr>
                        <td><input type="radio" name="id" value="{{ $category->id }}" @if($loop->first) checked @endif></td>
                        <td>{{ $category->name }}</td>
                    </tr>
                @endforeach
            </table>
        </form>
    </main>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>