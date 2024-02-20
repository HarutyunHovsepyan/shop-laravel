@extends('layout.main')

@section('content')

<div class="starter-template">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Amount: <b>{{$order->orderSum()}}$</b></h5>
                        <form action="{{route('cart-confirm')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" require placeholder="Enter Name">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone:</label>
                                <input type="text" class="form-control" id="phone" name="phone" required placeholder="Enter Phone Number">
                            </div>
                            <input type="hidden" name="token" value="">
                            <button type="submit" class="btn btn-primary btn-block">Buy</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
