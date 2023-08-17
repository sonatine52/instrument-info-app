<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>

<body>
    <header>
        <h1 class="display-inline">周辺機器一覧</h1>
        <a href="{{ route('admin') }}" class="display-inline"><button>&lt; 戻る</button></a>
    </header>

    <main>
        {{-- フラッシュメッセージ--}}
        @if (session('flash_message'))
            <p>{{ session('flash_message') }}</p>
        @endif

        {{-- モーダル --}}


        {{-- 機能ボタン --}}
        <a href="{{ route('admin.accessories.create') }}"><button>新規作成</button></a>
        <a href="{{ route('admin.accessories.edit', ['id' => $accessories[0]->id]) }}" id="edit"><button>編集</button></a>
        <input type="submit" value="削除" form="delete">

        <form action="{{ route('admin.accessories.destroy', ['id' => $accessories[0]->id]) }}" id="delete" method="post">
            @csrf
            @method('delete')
            {{-- レコード一覧 --}}
            <table border="1">
                <tr>
                    <th></th>
                    <th>機器名</th>
                    <th>画像</th>
                    <th>説明</th>
                    <th>楽器名</th>
                </tr>

                @foreach ($accessories as $accessory)
                    <tr>
                        <td><input type="radio" name="id" value="{{ $accessory->id }}" @if($loop->first)checked @endif></td>
                        <td>{{ $accessory->name }}</td>
                        <td><img src="{{ asset('images/'. $accessory->img) }}" alt="" width=100px></td>
                        <td>{{ $accessory->content }}</td>
                        <td>{{ $accessory->instrument->name }}</td>
                    </tr>
                @endforeach
            </table>
        </form>
    </main>
    <script src="{{ asset('/js/script.js') }}"></script>
</body>

</html>