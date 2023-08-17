@extends("layouts.base")


@section("title", "楽器紹介サイト | 紹介ページ")


@section("header", "紹介ページ")


@section("content")
    <div>
        <h3>{{$instrument->name}}</h3>
        <img src="{{ asset('images/'. $instrument->img) }}" alt="" width=200px>
        {{-- ブランドの表示。カラムが足りない --}}
        <p>{{$instrument->content}}</p>
    </div>
    <div>
        <h3>周辺機器</h3>
        @foreach ($instrument->accessories as $accessory)
            <p>{{$accessory->name}}</p>
            <img src="{{ asset('images/'. $accessory->img) }}" alt="" width=100px>
            <p>{{$accessory->content}}</p>
        @endforeach
    </div>
@endsection