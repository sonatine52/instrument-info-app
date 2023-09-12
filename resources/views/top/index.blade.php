@extends("layouts.base")


@section("title", "楽器紹介サイト | トップページ")


@section("header", "トップページ")


@section("content")

    @foreach ($categories as $category)
        @foreach ($category->instruments as $instrument)
                <a href="{{ route('instrument.detail', $instrument->id) }}" class="content" >
                    <h3>{{ $instrument->name }}</h3>
                    <p>{{ $instrument->content }}</p>
                    <img src="{{ asset(str_starts_with($instrument->img, 'images/') ? $instrument->img : 'images/'. $instrument->img) }}" alt="" width=150px>
                </a>
        @endforeach
    @endforeach

@endsection