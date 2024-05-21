@extends('layout.home')
@section('title','cart')
@section('basic')
<form action="{{ route('buy.cart',['user'=>$user->id]) }}" method="post" id="buyForm">
    @csrf
    <div class="row">
        <div class="col-md-10 offset-md-1 grid-margin stretch-card">
            <div class="card">
                <div class="card-body mt-5">
                    <div class="d-flex flex-row justify-content-center">
                        <h1 class="font-weight-bold">Cart items</h1>
                    </div>
                    <div class="row">
                        <table class="table">
                            <tbody class="text-black font-weight-bold">
                                @foreach ($cart_items as $cart_item)
                                    <tr>
                                        <td class="col-md-2" style="text-align: center;">
                                            <input type="checkbox" name="selected_items[]" value="{{ $cart_item->id }}" class="@if ($loop->count == 1) mt-3 @endif" style="transform: scale(1.5); display: block; margin: auto;">
                                        </td>
                                        <td class="col-md-2"><h3>{{ $cart_item->product_name }}</h3></td>
                                        <td class="col-md-2"><h3 class="product-price" data-original-price="{{ $cart_item->product_price }}">{{ $cart_item->product_price }}</h3></td>
                                        <td class="col-md-2">
                                            <div class="quantity-input">
                                                <button type="button" class="decrement" onclick="updateQuantity(this, -1)">-</button>
                                                <input type="number" name="quantities[{{ $cart_item->id }}]" value="1" min="1" onchange="updateTotalPrice(this)">
                                                <button type="button" class="increment" onclick="updateQuantity(this, 1)">+</button>
                                            </div>
                                        </td>
                                        <td class="col-md-2"><img src="products/{{ $cart_item->image }}" alt="" style="height: 3rem; width: 3rem;"></td>
                                        <td class="col-md-2"><div class="btn btn-danger"><a href="{{ route('cart.delete',['id'=>$cart_item->id,'user_id'=>$user->id]) }}" class="text-white">Remove from cart</a></div></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end mb-3">
        <button type="button" onclick="submitForm()" class="btn btn-primary">Buy</button>
    </div>
</form>

<script>
    function updateQuantity(button, change) {
        const input = button.parentElement.querySelector('input[type="number"]');
        let currentValue = parseInt(input.value);
        const newValue = currentValue + change;
        if (newValue >= 1) {
            input.value = newValue;
            updateTotalPrice(input);
        }
    }

    function updateTotalPrice(input) {
        const priceElement = input.closest('tr').querySelector('.product-price');
        const originalPrice = parseFloat(priceElement.getAttribute('data-original-price'));
        const quantity = parseInt(input.value);
        const totalPrice = originalPrice * quantity;
        priceElement.textContent = totalPrice.toFixed(2);
    }

    function submitForm() {
        const form = document.getElementById('buyForm');
        const checkboxes = form.querySelectorAll('input[type="checkbox"]');
        const selectedItems = [];
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                selectedItems.push(checkbox.value);
            }
        });
        const actionUrl = form.getAttribute('action');
        form.setAttribute('action', actionUrl + '?selected_items=' + selectedItems.join(','));
        form.submit();
    }
</script>

<style>
    .quantity-input {
        display: flex;
        align-items: center;
    }

    .quantity-input input {
        width: 100px;
        text-align: center;
    }

    .quantity-input button {
        background-color: #ddd;
        border: 1px solid #ccc;
        padding: 10px 10px;
        cursor: pointer;
    }

    .quantity-input button:hover {
        background-color: #ccc;
    }
</style>

@endsection
