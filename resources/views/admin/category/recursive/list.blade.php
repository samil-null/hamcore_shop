@foreach ($subCategories as $item)
    <li style="padding-left:{{$paddingLeft}}px;">{{$item->name}}</li>
    @isset($item->children)
        @include('admin.category.recursive.list',[
            'subCategories' =>  $item->children,
            'paddingLeft' => $paddingLeft + 10
        ])
    @endisset
@endforeach