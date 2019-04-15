@extends('admin.layout.index')

@section('content')
    <h1>Category page</h1>
    <ul>
        @foreach ($categories as $category)
            <li>{{$category->name}}</li>
            @isset ($category->children)
                @include('admin.category.recursive.list',[
                    'subCategories' => $category->children,
                    'paddingLeft' => $paddingLeft
                ])
            @endisset
        @endforeach
        
    </ul>
@endsection

@section('actions')
	<a href="{{route('admin.users.create')}}" type="button" class="btn btn-primary btn-sm">Добавить Категорию</a>
	<div class="nav-item dropdown">
      <a class="nav-link nav-link-icon" href="#" id="navbar-success_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="ni ni-settings-gear-65"></i>
        <span class="nav-link-inner--text d-lg-none">Settings</span>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-success_dropdown_1">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </div>
@endsection