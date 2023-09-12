@extends("layouts.base")


@section("title", "楽器紹介サイト | 紹介ページ")


@section("header", "紹介ページ")


@section("content")
    <h3>{{$instrument->name}}</h3>
    <div class="instrument">
        <img src="{{ asset(str_starts_with($instrument->img, 'images/') ? $instrument->img : 'images/'. $instrument->img) }}" alt="" width=200px>
        {{-- ブランドの表示 --}}
        <p>{{$instrument->content}}</p>
    </div>
    <h3>周辺機器</h3>
    <div class="accessories">
        @foreach ($instrument->accessories as $accessory)
            <div id="accessory-detail">
                <p>{{$accessory->name}}</p>
                <img src="{{ asset(str_starts_with($accessory->img, 'images/') ? $accessory->img : 'images/'. $accessory->img) }}" alt="" width=100px>
            </div>
        @endforeach
    </div>
    {{-- モーダル --}}
    @foreach ($instrument->accessories as $accessory)
    <div class="modal-back accessory-hidden">
        <div class="modal-box">
            <p>{{$accessory->name}}</p>
            <img src="{{ asset(str_starts_with($accessory->img, 'images/') ? $accessory->img : 'images/'. $accessory->img) }}" alt="" width=200px>
            <p>{{$accessory->content}}</p>
            <button id="close-modal">×</button>
        </div>
    </div>
    @endforeach
@endsection