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
        <h1 class="display-inline">編集</h1>
        <a href="{{ route('admin.categories.index') }}" class="display-inline"><button>&lt; 戻る</button></a>
    </header>

    <main>
        {{-- エラーメッセージ --}}
        @if($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- フォーム --}}
        <form action="{{ route('admin.categories.update', $category) }}" method="post">
            @csrf
            @method('patch')
            <div>
                <label for="">カテゴリ名</label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}">
            </div>
            <div>
                <button type="submit">更新</button>
            </div>
        </form>
    </main>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>