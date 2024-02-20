@extends('admin.dashboard.main')

@section('content')
<div class="col-md-12">
    <h1>Order</h1>
    <table class="table">
        <thead>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Name
                </th>
                <th>
                    Phone
                </th>
                <th>
                    Created_at
                </th>
                <th>
                    Ammount
                </th>
                <th>
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>
                    {{ $order->id }}
                </td>
                <td>
                    {{ $order->name }}
                </td>
                <td>
                    {{ $order->phone }}
                </td>
                <td>
                    {{ $order->created_at }}
                </td>
                <td>
                    {{ $order->orderSum() }}$
                </td>
                <td>
                    <form action="{{ route('update-order-status', $order->id) }}" method="POST" class="status-form">
                        @csrf
                        @if( $order->status !='Approved')
                        <button type="submit" class="btn btn-primary">{{ $order->status }}</button>
                        @else
                        <button disabled type="submit" class="btn btn-success">{{ $order->status }}</button>
                        @endif
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
