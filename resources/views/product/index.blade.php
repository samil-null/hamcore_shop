@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$product->name}}</div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <button 
                        class="btn btn-primary add-to-cart"
                        data-amount="1"
                        data-product-id="{{$product->id}}"
                        >Add to cart</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection