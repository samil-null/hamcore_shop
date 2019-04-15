@foreach ($subCategories as $item)
    <option value="{{$item->id}}"
        @isset($category->parent_id)
            @if ($item->id == $category->parent_id) selected @endif
            @if ($item->id == $category->id) disabled @endif
        @endisset
        >{{$delimiter . ' ' .$item->name}}</option>
    @isset($item->children)
        @include('admin.category.recursive.select',[
            'subCategories' =>  $item->children,
            'delimiter' => $delimiter . ' -'
        ])
    @endisset
@endforeach