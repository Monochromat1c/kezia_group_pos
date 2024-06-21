@extends('layout.main')

@section('content')

@include('include.bg')
@include('include.sidebar')

<div class="container-fluid p-0" style="margin-left: 80px; margin-right: 10px;">
    <div class="card"
        style="position: relative; margin-top: 5px; background-color: rgba(96, 91, 91, 0.95); color: #efefef">
        <div class="card-header d-flex justify-content-between align-items-center"
            style="background-color: rgba(33, 30, 30, 0.777); color: aliceblue; border-bottom: none;">
            <h5 class="card-title" style="font-family: 'Bell MT'; font-size: 46px; margin-bottom: 0;">Add Orders To Cart
            </h5>
        </div>

        <div class="row p-4">
            <div class="col-md-6 d-flex align-items-center">
                <form id="add-to-cart-form" class="w-100" style="font-family: Metropolis;">
                    <div class="form-row">
                        <div class="form-group col-md-6 mb-3">
                            <label for="product">Product</label>
                            <select id="product" class="form-control" required>
                                <option value="" disabled selected>Select a product</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" data-price="{{ $product->price }}"
                                        data-stock="{{ $product->stock }}">{{ $product->product_name }} -
                                        {{ $product->price }}</option>
                                @endforeach
                            </select>
                            <small id="stock-info" class="form-text text-muted">Stock: 0</small>
                        </div>

                        <div class="form-group col-md-3 mb-3">
                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" class="form-control" min="1" value="1" required>
                        </div>
                        <div class="form-group col-md-3 mb-3">
                            <label for="discount">Discount</label>
                            <select id="discount" class="form-control">
                                <option value="" selected>No discount</option>
                                <option value="20">Senior & PWD Discount (20%)</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mb-2">
                        <button type="submit" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor"
                                class="bi bi-cart-plus" viewBox="0 0 20 20">
                                <path
                                    d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z" />
                                <path
                                    d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                            </svg> Add to Cart
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Product List</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col"> Product Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ $product->product_image ? asset('storage/product/' . $product->product_image) : asset('product/album.png') }}"
                                                alt="Product Image"
                                                style="max-width: 50px; max-height: 50px; width: 100%; height: 100%; object-fit: cover;">
                                        </td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>₱{{ $product->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4" style="margin-bottom: 50px; margin-right: 20px; margin-left: 20px;">
            <div class="card-header">
                <h2>Cart</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Total</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="cart-items">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-right">
                <h3>Total: <span id="total-price">0.00</span></h3>
                <form id="checkout-form" method="POST" action="{{ route('checkout') }}">
                    @csrf
                    <input type="hidden" name="cart_items" id="cart-items-data">
                    <button type="submit" class="btn btn-success mt-3">Proceed to Checkout</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function () {
        function updateTotalPrice() {
            let total = 0;
            $('#cart-items tr').each(function () {
                const rowTotal = parseFloat($(this).find('.item-total').text().replace('₱', '').replace(',', ''));
                total += rowTotal;
            });
            $('#total-price').text('₱' + total.toLocaleString('en-US', {
                minimumFractionDigits: 2
            }));
        }

        function updateStockInfo() {
            const selectedOption = $('#product').find(':selected');
            const stock = selectedOption.data('stock');
            $('#stock-info').text(`Stock: ${stock}`);
        }

        $('#product').on('change', function () {
            updateStockInfo();
            const selectedOption = $(this).find(':selected');
            const price = selectedOption.data('price');
            $('#price').val(price);
        });

        $('#add-to-cart-form').on('submit', function (event) {
            event.preventDefault();

            const selectedOption = $('#product option:selected');
            const product = $('#product').val();
            const productText = $('#product option:selected').text().split(' - ')[0];
            const quantity = parseInt($('#quantity').val());
            const price = parseFloat(selectedOption.data('price'));
            const stock = selectedOption.data('stock');
            const discount = $('#discount').val();
            const discountText = $('#discount option:selected').text() || 'No discount';
            const discountAmount = discount ? (price * quantity * discount / 100) : 0;
            const total = (price * quantity) - discountAmount;

            if (quantity > stock) {
                alert('Not enough stock available.');
                return;
            }

            selectedOption.data('stock', stock - quantity);

            const newRow = `
                <tr>
                    <td>${productText}</td>
                    <td>${quantity}</td>
                    <td>₱${price.toLocaleString('en-US', { minimumFractionDigits: 2 })}</td>
                    <td>${discountText}</td>
                    <td class="item-total">₱${total.toLocaleString('en-US', { minimumFractionDigits: 2 })}</td>
                    <td><button class="btn btn-danger btn-sm remove-item" data-product="${product}" data-quantity="${quantity}">Remove</button></td>
                </tr>
            `;

            $('#cart-items').append(newRow);
            updateTotalPrice();
            updateStockInfo();
        });

        $(document).on('click', '.remove-item', function () {
            const product = $(this).data('product');
            const quantity = $(this).data('quantity');
            const selectedOption = $(`#product option[value="${product}"]`);
            const stock = selectedOption.data('stock');

            selectedOption.data('stock', stock + quantity);

            $(this).closest('tr').remove();
            updateTotalPrice();
            updateStockInfo();
        });

        $('#checkout-form').on('submit', function () {
            const cartItems = [];
            $('#cart-items tr').each(function () {
                const product = $(this).find('td:eq(0)').text();
                const quantity = $(this).find('td:eq(1)').text();
                const price = $(this).find('td:eq(2)').text().replace('₱', '').replace(',', '');
                const discount = $(this).find('td:eq(3)').text();
                const total = $(this).find('td:eq(4)').text().replace('₱', '').replace(',', '');
                cartItems.push({
                    product: product,
                    quantity: quantity,
                    price: parseFloat(price),
                    discount: discount,
                    total: parseFloat(total)
                });
            });
            $('#cart-items-data').val(JSON.stringify(cartItems));
        });

        updateStockInfo();
    });
</script>

@endsection
