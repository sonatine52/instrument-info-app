<!DOCTYPE html>
<html lang="ja">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}" >
</head>

<body>
    <header>
        <h1 class="display-inline">新規作成</h1>
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
        <form action="{{ route('admin.instruments.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="">楽器名</label><br>
                <input type="text" name="name" value="{{ old('name') }}">
            </div><br>

            <div>
                <label for="">音色データ</label><br>
                {{-- 音色データ(未作成) --}}
            </div><br>

            <div>
                <label for="">画像</label><br>
                <input type="file" name="img" id="" accept="image/*" onchange="previewImage(this);"><br>
                {{-- 選択したファイルを表示する --}}
                <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:200px;" alt="" border="1">
            </div><br>

            <div>
                <label for="">説明</label><br>
                <textarea name="content" id="" cols="50" rows="10">{{ old('content') }}</textarea>
            </div><br>

            <div>
                <label for="">カテゴリ</label><br>
                <select name="category_id">
                    <option value="">選択されていません</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" 
                            @if ( old('category_id') == $category->id ) 
                                selected 
                            @endif>{{ $category->name }}
                        </option>
                    @endforeach    
                </select><br>

                {{-- <select name="category_id">
                    <option value="">選択されていません</option>
                    <option value="1" @if( old('category_id') === "1" ) selected @endif>管楽器</option>
                    <option value="2" @if( old('category_id') === "2" ) selected @endif>弦楽器</option>
                    <option value="3" @if( old('category_id') === "3" ) selected @endif>打楽器</option>
                    <option value="4" @if( old('category_id') === "4" ) selected @endif>鍵盤楽器</option>
                </select><br> --}}
                
                {{-- @foreach ($categories as $category)
                    <label for="">{{ $category->name }}</label>
                    <input type="radio" name="category_id" value="{{ $category->id }}" 
                        @if ( old('category_id') == $category->id ) 
                            checked 
                        @endif>
                @endforeach
                <br>  --}}
                
                {{-- <label for="">管楽器</label>
                <input type="radio" name="category_id" value="1" @if( old('category_id') === "1" ) checked @endif>
                <label for="">弦楽器</label>
                <input type="radio" name="category_id" value="2" @if( old('category_id') === "2" ) checked @endif>
                <label for="">打楽器</label>
                <input type="radio" name="category_id" value="3" @if( old('category_id') === "3" ) checked @endif>
                <label for="">鍵盤楽器</label>
                <input type="radio" name="category_id" value="4" @if( old('category_id') === "4" ) checked @endif>
                <br> --}}
            </div><br>

            <button type="submit">作成</button>
            {{-- <input type="submit" value="作成"> --}}
        </form>
    </main>
    <script src="{{ asset('/js/script.js') }}"></script>
</body>

</html>


