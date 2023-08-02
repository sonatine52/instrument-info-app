@extends("layouts.base")


@section("title", "楽器紹介サイト | トップページ")


@section("header", "トップページ")


@section("content")

    {{-- DBのinstrumentsテーブルのnameとcontentを順番に表示する --}}

    <div class="display-flex">
        @foreach ($categories as $category)
            @foreach ($category->instruments as $instrument)
            
                <div class="flex-basis">
                    <h3>{{ $instrument->name }}</h3>
                    <p>{{ $instrument->content }}</p>
                    {{-- <img src="{{ asset('/images/trumpet.png') }}" width="200" height="200"> --}}
                    <img src="{{ asset('/images/' . $instrument->img) }}"  width=200px height=200px>
                </div>
            @endforeach
        @endforeach
    </div>

@endsection