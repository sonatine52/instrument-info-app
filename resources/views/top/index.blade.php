@extends("layouts.base")


@section("title", "楽器紹介サイト | トップページ")


@section("header", "トップページ")


@section("content")

    @foreach ($categories as $category)
        @foreach ($category->instruments as $instrument)
            <a href="{{ route('instrument.detail', $instrument->id) }}">
                <div class="content">
                    <h3>{{ $instrument->name }}</h3>
                    <p>{{ $instrument->content }}</p>
                    {{-- <img src="{{ asset($instrument->img) }}"  width=200px height=200px> --}}
                    <img src="{{ asset('images/'. $instrument->img) }}"  width=150px>
                </div>
            </a>
        @endforeach
    @endforeach

@endsection