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
        <form action="{{ route('admin.accessories.update', $accessory) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div>
                <label for="">機器名</label><br>
                <input type="text" name="name" value="{{ old('text', $accessory->name) }}">
            </div><br>

            <div>
                <label for="">画像</label><br>
                <div>
                    <p>&lt;更新前&gt;</p>
                    <img src="{{ asset(str_starts_with($accessory->img, 'images/') ? $accessory->img : 'images/'. $accessory->img) }}" alt="" style="max-width:200px;" border="1">
                </div>
                <div>
                    <p>&lt;更新後&gt;</p>
                    <input type="file" name="img" accept="image/*" onchange="previewImage(this);"><br>
                    <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="" style="max-width:200px;" border="1">
                </div>
            </div><br>

            <div>
                <label for="">説明</label><br>
                <textarea name="content" id="" cols="50" rows="10">{{ old('content', $accessory->content) }}</textarea>
            </div><br>

            <div>
                <label for="">楽器名</label><br>
                <select name="instrument_id" id="">
                    <option value="">選択されていません</option>
                    @foreach($instruments as $instrument)
                        <option value="{{ $instrument->id }}" 
                            @if( old('instrument_id', $accessory->instrument_id) == $instrument->id )
                                selected
                            @endif>{{ $instrument->name }}
                        </option>
                    @endforeach
                </select>
            </div><br>

            <div>
                <button type="submit">更新</button>
            </div>
        </form>
    </main>
    <script src="{{ asset('/js/script.js') }}"></script>
</body>

</html>