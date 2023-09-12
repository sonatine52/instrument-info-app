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
        <a href="{{ route('admin.accessories.index') }}" class="display-inline"><button>&lt; 戻る</button></a>
    </header>

    <main>
        {{-- エラーメッセージ --}}
        @if($errors->any())
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- フォーム --}}
        <form action="{{ route('admin.accessories.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="">機器名</label><br>
                <input type="text" name="name" value="{{ old('name') }}">
            </div><br>

            <div>
                <label for="">画像</label><br>
                <input type="file" name="img" accept="image/*" onchange="previewImage(this);"><br>
                {{-- 選択したファイルを表示する --}}
                <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:200px;" alt="" border="1">
            </div><br>
            
            <div>
                <label for="">説明</label><br>
                <textarea name="content" id="" cols="50" rows="10">{{ old('content') }}</textarea>
            </div><br>

            <div>
                <label for="">楽器名</label><br>
                <select name="instrument_id" id="">
                    <option value="">選択されていません</option>
                    @foreach($instruments as $instrument)
                        <option value="{{ $instrument->id }}"
                            @if( old('instrument_id') == $instrument->id )
                                selected
                            @endif>{{ $instrument->name }}
                        </option>
                    @endforeach
                </select>
            </div><br>

            <div>
                <button type="submit">作成</button>
            </div>
        </form>
    </main>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>