<h2>カテゴリ</h2>
<p>
    <a href="{{ route('top.index') }}">トップページ</a>
</p>

@foreach ($categories as $category) 
    <p>{{$category->name}}</p>
    <ul>
        @foreach ($category->instruments as $instrument)
        {{-- <li><a href="{{ route("instrument.detail", $id=$instrument->id) }}">{{$instrument->name}}</a> --}}
            <li><a href="{{ route("instrument.detail", ['id'=>$instrument->id]) }}">{{$instrument->name}}</a>
                <ul>
                    @foreach ($instrument->accessories as $accessory)
                        <li><a href="">{{$accessory->name}}</li></a>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
@endforeach
