@extends('layout.main')

@section('content')

@include('include.bg')
@include('include.sidebar')

<div class="container-fluid p-0" style="margin-left: 80px; margin-right: 10px;">
    <div class="card"
        style="position: relative; margin-top: 5px; background-color: rgba(96, 91, 91, 0.95); color: #efefef">
        <div class="card-header d-flex justify-content-between align-items-center"
            style="background-color: rgba(33, 30, 30, 0.777); color: aliceblue; border-bottom: none;">
            <h5 class="card-title" style="font-family: 'Bell MT'; font-size: 46px; margin-bottom: 0;">Receipt</h5>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td>{{ $item['product'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>₱{{ number_format($item['price'], 2) }}</td>
                            <td>{{ $item['discount'] }}</td>
                            <td>₱{{ number_format($item['total'], 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-end">
                <h3>Total Amount: <span>₱{{ number_format($totalAmount, 2) }}</span></h3>
            </div>
            <div class="d-flex justify-content-end">
                <h3>Discount: <span>₱{{ number_format($totalDiscount, 2) }}</span></h3>
            </div>
            <div class="d-flex justify-content-end">
                <h3>Payable Amount: <span>₱{{ number_format($payableAmount, 2) }}</span></h3>
            </div>
            <div class="d-flex justify-content-end">
                <h3>Amount Paid: <span>₱{{ number_format($amountPaid, 2) }}</span></h3>
            </div>
            <div class="d-flex justify-content-end">
                <h3>Change: <span>₱{{ number_format($change, 2) }}</span></h3>
            </div>
            <div class="kld--display-flex kld--justify-flex-end">
                                <button type="" onclick="window.print()"
                                    class="kld--button-primary kld--text-color-white kld--border-radius-medium kld--padding-button-2 kld--margin-top-1 kld--margin-bottom-1">
                                    <i class="fa-solid fa-print"></i>
                                </button>
                            </div>
        </div>
    </div>
</div>

@endsection
