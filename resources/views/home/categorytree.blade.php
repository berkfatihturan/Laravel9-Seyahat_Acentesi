@foreach($children as $subcategory)

    @if(count($subcategory->children))

        <div class="col-sm-4" style="margin-right: 10px">
            <span class="sub-title">{{$subcategory->title}}</span>
            <ol class="sub-list">
                @include('home.categorytree',['children'=>$subcategory->children])
            </ol>
        </div>
    @else

        <li>
            <a class="sub-list__item" href="{{route('home_categorypackage',['id'=>$subcategory->id, 'slug'=>$subcategory->title])}}">{{$subcategory->title}}</a>
        </li>

    @endif

@endforeach

