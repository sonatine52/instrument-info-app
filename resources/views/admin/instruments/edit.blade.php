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
        <a href="{{ route('admin.instruments.index') }}" class="display-inline"><button>&lt; 戻る</button></a>
    </header>

    <main>
        {{-- エラーメッセージ --}}
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>  
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- フォーム --}}
        <form action="{{ route('admin.instruments.update', ['id'=>$instrument->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div>
                <label for="">楽器名</label><br>
                <input type="text" name="name" value="{{ old('name', $instrument->name) }}">
            </div><br>

            <div>
                <label for="">音色データ</label><br>
                {{-- 音色データ(未作成) --}}
            </div><br>

            <div>
                <label for="">画像</label><br>
                <div>
                    <p>&lt;更新前&gt;</p>
                    <img src="{{ asset(str_starts_with($instrument->img, 'images/') ? $instrument->img : 'images/'. $instrument->img) }}" alt="" style="max-width:200px;" border="1">
                </div>
                <div>
                    <p>&lt;更新後&gt;</p>
                    <input type="file" name="img" accept="image/*" onchange="previewImage(this);"><br>
                    <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="" style="max-width:200px;" border="1">
                </div>
            </div><br>

            <div>
                <label for="">説明</label><br>
                <textarea name="content" id="" cols="50" rows="10">{{ old('content', $instrument->content) }}</textarea>
            </div><br>

            <div>
                <label for="">カテゴリ</label><br>
                <select name="category_id">
                    <option value="">選択されていません</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" 
                            @if ( old('category_id', $instrument->category_id) == $category->id ) 
                                selected 
                            @endif>{{ $category->name }}
                        </option>
                    @endforeach    
                </select><br>
            </div><br>

            <div>
                <button type="submit">更新</button>
                {{-- <input type="submit" value="更新"> --}}
            </div>
        </form>
        <script src="{{ asset('js/script.js') }}"></script>
    </main>
</body>
</html>