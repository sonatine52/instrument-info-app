<h2>カテゴリ</h2>
<ul>
    <li><a href="{{ route('top.index') }}">トップページ</a></li>

    {{-- categoriesテーブルのnameを表示する --}}
    {{-- instrumentsテーブルのcategory_idカラムが一致するnameを表示する --}}
    {{-- accessoriesテーブルのinstruments_idカラムが一致するnameを開閉表示する --}}

    
    {{-- カテゴリの名前を表示する --}}
    

    @foreach ($categories as $category) 
        <li><a href="">{{$category->name}}</a>
            <ul>
                @foreach ($category->instruments as $instrument)
                    <li><a href="{{ route("instrument.detail", ['id'=>$instrument->id]) }}">{{$instrument->name}}</a>
                        <ul>
                            @foreach ($instrument->accessories as $accessory)
                                <li>{{$accessory->name}}</li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </li>
    @endforeach



    {{-- 楽器の名前を表示する --}}
    {{--   
        @foreach ($instruments as $instrument) 
            <ul>
                <li><a href="">{{$instrument->name}}</a></li>
            </ul>
        @endforeach 
    --}}

    {{-- アクセサリーの名前を表示する --}}
    {{--   
        @foreach ($instruments as $instrument) 
            @foreach ($instrument->accessories as $accessory)
                <ul>
                    <li><a href="">{{$accessory->name}}</a></li>
                </ul>
            @endforeach
        @endforeach 
    --}}


    {{--     
        @foreach ($instruments as $instrument)
            @foreach ($instrument->categories as $category)
                <ul>
                    <li>{{$category->name}}
                        <ul>
                            <li>{{$instrument->name}}
                                @foreach ($instrument->accessories as $accessory)
                                    <ul>
                                        <li><a href="">{{$accessory->name}}</a></li>
                                    </ul>
                                @endforeach
                            </li>
                        </ul>
                    </li>
                </ul>
            @endforeach
        @endforeach
    --}}


{{-- 
    <li><a href="">管楽器</a>
        <ul>
            @foreach ($instruments as $instrument) 
                <li><a href="">{{$instrument->name}}</a>
                    <ul>
                        開閉式
                        @foreach ($instrument->accessories as $accessory)
                            <li><a href="">{{$accessory->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
            @endforeach 
        </ul>
    </li>  --}}

    {{-- <li><a href="">弦楽器</a>
        <ul>
            <li><a href="" >楽器2</a>
                <ul>
                    <li><a href="" >周辺機器</a></li>
                </ul>
            </li>
        </ul>
    </li>

    <li><a href="">打楽器</a>
        <ul>
            <li><a href="" >楽器3</a>
                <ul>
                    <li><a href="" >周辺機器</a></li>
                </ul>
            </li>
        </ul>
    </li>

    <li><a href="">鍵盤楽器</a>
        <ul>
            <li><a href="" >楽器4</a>
                <ul>
                    <li><a href="" >周辺機器</a></li>
                </ul>
            </li>
        </ul>
    </li> --}}

</ul>