@extends('admin.layout.index')

@section('content')
    <div class="row ">
        <div class="col-lg-6 bg-secondary">
            <form action="{{route('admin.category.store')}}" id="category-store" method="post" class="card-body" style="background-color: #f7fafc;">
                @csrf
                <div class="form-group">
                    <label class="form-control-label" for="input-username">Родительская категория</label>
                    <select class="form-control form-control-alternative" name="parent_id">
                        <option value="0"
                        @isset($category->parent_id)
                            @if ($category->parent_id == 0) selected @endif
                        @endisset
                        >Без родителя</option>
                        @foreach ($categories as $_category)

                            <option value="{{$_category->id}}"
                                @isset($category->parent_id)
                                    @if ($_category->id == $category->parent_id) selected @endif 
                                @endisset   
                                >{{$_category->name}}</option>

                            @isset($_category)
                                @include('admin.category.recursive.select',[
                                    'subCategories' => $_category->children,
                                    'delimiter' => $delimiter . ' -'
                                ])
                            @endisset    
                        @endforeach
                        
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="input-prod-name">Название</label>
                    <input type="text" name="name" id="input-prod-name" class="form-control form-control-alternative"  placeholder="" value="{{$category->name??''}}">
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="input-prod-url">Url</label>
                    <input type="email" name="slug" id="input-prod-url" class="form-control form-control-alternative" placeholder="" value="{{$category->slug??''}}">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('actions')
    <button type="button" class="btn btn-primary btn-sm" onclick="$('#category-store').submit()">Сохранить</button>
    <button type="button" class="btn btn-secondary btn-sm btn-danger">Удалить</button>
@endsection