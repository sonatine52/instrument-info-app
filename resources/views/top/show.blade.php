@extends("layouts.base")


@section("title", "楽器紹介サイト | 紹介ページ")


@section("header", "紹介ページ")


@section("content")

    <h3>{{$instrument->name}}</h3>
        {{-- 説明の表示 --}}
        <p>{{$instrument->content}}</p>
        
        {{-- ブランドの表示。カラムが足りない --}}

        
        <h3>周辺機器</h3>
        {{-- 楽器の画像の表示 --}}
        <img src="{{ asset('/images/' . $instrument->img) }}"  width=200px height=200px>
        
        @foreach ($instrument->accessories as $accessory)
            {{-- 画像の左右に周辺機器の画像と名前の表示 --}}
            <img src="{{$accessory->img}}" alt="">
            <p>{{$accessory->name}}</p>
            
        
        @endforeach

@endsection