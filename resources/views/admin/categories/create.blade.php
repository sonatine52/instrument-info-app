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
        <h1 class="display-inline">新規作成</h1>
        <a href="{{ route('admin.categories.index') }}" class="display-inline"><button>&lt; 戻る</button></a>
    </header>

    <main>
        {{-- エラーメッセージ --}}
        @if ($errors->any())
            <div>
                <ul>
                    @foreach($errors as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- フォーム --}}
        <form action="{{ route('admin.categories.store') }}" method="post">
            @csrf
            <div>
                <label for="">カテゴリ名</label><br>
                <input type="text" name="name" value="{{ old('name') }}"> 
            </div>
            <button type="submit">作成</button>
        </form>
    </main>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>