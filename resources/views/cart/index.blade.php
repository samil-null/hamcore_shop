@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart['products'] as $item)
                            <tr data-wrap-product-id="{{$item['product']->id}}">
                                <th scope="row">1</th>
                                <td>{{$item['product']->name}}</td>
                                <td>{{$item['amount']}} шт.</td>
                                <td>{{$item['totalPrice']}} руб.</td>
                                <td>
                                    <a href="" class="remove-product" 
                                                data-product-id="{{$item['product']->id}}">&#10006;</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <a href="" class="btn btn-primary">make order</a>
            </div>
        </div>
    </div>
    <script>
            </script>
@endsection