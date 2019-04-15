@extends('admin.layout.index')

@section('content')
    <div class="row">
        <div class="col-lg-6 bg-secondary">
            <form action="{{route('admin.users.store')}}" id="product-store" method="post">
                @csrf
                <div class="form-group">
                  <input type="text" name="name" class="form-control form-control-alternative" placeholder="" value="{{$product->name??''}}">
                </div>
                <div class="form-group">
                  <input type="email" name="slug" class="form-control form-control-alternative" placeholder="" value="{{$product->slug??''}}">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('actions')
    <button type="button" class="btn btn-primary btn-sm" onclick="$('#product-store').submit()">Сохранить</button>
    <button type="button" class="btn btn-secondary btn-sm btn-danger">Удалить</button>
@endsection