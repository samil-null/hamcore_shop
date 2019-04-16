@extends('admin.layout.index')

@section('content')
    <form action="{{route('admin.users.store')}}" id="product-store" method="post">
        <div class="row">
            <div class="col-lg-6 bg-secondary">
                <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label" for="input-prod-name">Название</label>
                        <input type="text" name="name" id="input-prod-name" class="form-control form-control-alternative" placeholder="" value="{{$product->name??''}}">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="input-prod-slug">Url</label>
                        <input type="text" name="slug" id="input-prod-slug" class="form-control form-control-alternative" placeholder="" value="{{$product->slug??''}}">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="cart-body">
                    <div class="form-group">
                        <label class="form-control-label" for="input-prod-slug">Url</label>
                        <div class="file-loader">
                            <button class="btn btn-icon btn-3 btn-primary file-loader-btn" type="button">
                                <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                                <span class="btn-inner--text">Загрузить фото</span>
                            </button>
                            <input type="file" multiple name="images" class="file-input">
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('actions')
    <button type="button" class="btn btn-primary btn-sm" onclick="$('#product-store').submit()">Сохранить</button>
    <button type="button" class="btn btn-secondary btn-sm btn-danger">Удалить</button>
@endsection