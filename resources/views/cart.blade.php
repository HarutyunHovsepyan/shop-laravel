@extends('layout.main')

@section('content')

<div class="starter-template">
    <div class="pane">
        <div class="row row-cols-1 g-4">
            @if($order && $order->products->isNotEmpty())
            @foreach ($order->products as $product)
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Product Name: {{ $product->name }}</h5>
                        <p class="card-text">Quantity: <span>{{ $product->pivot->count }}</span></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <form action="{{ route('cart-add', $product) }}" method="post" class="d-inline">
                                <button type="submit" class="btn btn-sm btn-success">+</button>
                                @csrf
                            </form>
                            <form action="{{ route('cart-minus', $product) }}" method="post" class="d-inline">
                                <button type="submit" class="btn btn-sm btn-danger">-</button>
                                @csrf
                            </form>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <span>Total: {{ $product->getTotalProductAmount($product->pivot->count) }}$</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="card">
                    <div class="card-body d-flex justify-content-between">
                        <span>Total Amount:</span>
                        <span>{{ $order->orderSum() }}$</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <a type="submit" href="{{route('cart-place')}}" class="btn btn-primary btn-block">Buy</a>
            </div>
        </div>
        @else
        <div class="row mt-3">
            <div class="col">
                <h2 class="text-center text-danger">Your Cart is Empty !</h2>
            </div>
        </div>
        @endif
    </div>
</div>



@endsection
