@extends('admin.layout.index')

@section('content')
    <div class="row">
        <div class="col-lg-6 bg-secondary">
            <form action="{{route('admin.users.store')}}" id="user-store" method="post">
                @csrf
                <div class="form-group">
                  <input type="text" name="name" class="form-control form-control-alternative" placeholder="Логин" value="{{$user->name??''}}">
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-alternative" placeholder="E-mail" value="{{$user->email??''}}">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-alternative" name="password" placeholder="Пароль" value="{{$user->password??''}}">
                </div>
                <div class="form-group">
                  <input type="text" name="password_confirmation" class="form-control form-control-alternative"  placeholder="Повторите пароль" value="{{$user->password??''}}">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('actions')
    <button type="button" class="btn btn-primary btn-sm" onclick="$('#user-store').submit()">Сохранить</button>
    <button type="button" class="btn btn-secondary btn-sm btn-danger">Удалить</button>
@endsection