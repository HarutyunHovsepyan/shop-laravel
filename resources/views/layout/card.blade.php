<div class="col-sm-6 col-md-4">
    <div class="thumbnail" style="border: 1px solid #ccc; border-radius:20px;margin-top: 20px; padding: 15px;">
        <img src="{{ asset('path/to/your/image.jpg') }}" alt="Product Image" style="width: 100%; height: 200px; object-fit: cover;">
        <div class="caption">
            <h3 style="margin-top: 20px;">{{$product->name}}</h3>
            <p style="font-weight: bold; font-size: 18px;">{{$product->price}}$</p>
            <p>
            <form action="{{ route('cart-add', $product->id) }}" method="POST" class="row g-3 align-items-center">
                @csrf
                <div class="col-auto">
                    @if($product->category->name === 'Subscription')
                    <button type="submit" class="btn btn-danger" disabled>Comming Soon</button>
                    @else
                    <button type="submit" class="btn btn-success">Add to Cart</button>
                    @endif
                </div>
                <div class="col-auto">
                    <p class="mb-4">Category: {{$product->category->name}}</p>
                </div>

                <div class="col-auto">
                    <a href="{{ route('product', [$product->category->code, $product->id]) }}" class="btn btn-info" role="button">View More</a>
                </div>
            </form>
            </p>
        </div>
    </div>
</div>
