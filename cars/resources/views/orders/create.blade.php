@extends('layouts.base')
@section('content')
@php
$discount=Session::get('discount');
@endphp
<?php
$customer_id = $user->id;
$shipping_cost = config('global.shipping');
$price = 0;
foreach ($cart_cars as $cart_car) {
    $price += $cart_car['price'];
}
$pstAmount = $price * $user->province->pst/100;
$gstAmount = $price * $user->province->gst_hst/100;
$promo_discount = 0;
if (!empty($discount)) {
    $promo_discount = $price * $discount['discount_percentage'] / 100;
}
$finalPrice = $price + $gstAmount + $pstAmount + $shipping_cost - $promo_discount;
?>
<div class="checkout container">


    <h1>{{$title}}</h1>
    <div class="row">
        <div class="col">
            <div class="cart-summary">
                <h2>Cart Summary</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Car ID</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart_cars as $cart_car)
                        <tr>
                            <td>{{ $cart_car['id'] }}</td>
                            <td>{{ $cart_car['make'] }}</td>
                            <td>{{ $cart_car['model'] }}</td>
                            <td>${{ $cart_car['price'] }}</td>
                            <td><img src="/images/cars/{{ $cart_car['image'] }}" alt="{{ $cart_car['make'] }}" style="width: 100px;height:auto">
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
                <div class="my-3">
                    <form action="/discount" method="POST">
                        @csrf
                        <label for="">Promo Code</label>
                        <input type="text" class="form-control" name="promo_code" <?= (isset($discount['has_applied']) && $discount['has_applied']) ? 'disabled' : '' ?>>
                        @error('promo_code')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <button class="btn btn-primary btn-sm">Apply</button>
                    </form>
                    <h2>Tax Calculation</h2>

                    <table id="tax">
                        <tr>
                            <th>Subtotal</th>
                            <td>$<?php echo number_format($price, 2); ?></td>
                        </tr>
                        <tr>
                            <th>PST ({{$user->province->pst}}%)</th>
                            <td>$<?php echo number_format($pstAmount, 2); ?></td>
                        </tr>
                        <tr>
                            <th>GST ({{$user->province->gst_hst}}%)</th>
                            <td>$<?php echo number_format($gstAmount, 2); ?></td>
                        </tr>
                        <tr>
                            <th>Shipping Cost</th>
                            <td>$<?php echo number_format($shipping_cost, 2); ?></td>
                        </tr>
                        <tr>
                            <th>Promo Discount</th>
                            <td>${{$promo_discount}}</td>
                        </tr>
                        <tr>
                            <th>Final Price</th>
                            <td>$<?php echo number_format($finalPrice, 2); ?></td>
                        </tr>

                    </table>
                </div>

            </div>
        </div>
        <div class="col">
            <form action="/post_checkout" method="POST">
                @if(!empty($discount))
                <input type="hidden" name="promo_code" value="{{$discount['promo_code']}}">
                @endif

                <div class="checkout-form">
                    <h3>Billing Information</h3>
                    <div>
                        <label for="name">Full Name:</label>
                        <input type="text" id="name" name="name" value="{{$user->first_name}} {{$user->last_name}}" disabled>
                    </div>

                    <div>
                        <label for="email">Email:</label>
                        <input type="email" id="email" value="{{ $user->email }}" disabled>
                    </div>

                    <div>
                        <label for="street">Street:</label>
                        <input type="text" id="street"  value="{{ $user->street  }}" disabled>
                    </div>

                    <div>
                        <label for="city">City:</label>
                        <input type="text" id="city"  value="{{ $user->city  }}" disabled>
                    </div>

                    <div>
                        <label for="province_state">Province State:</label>
                        <input type="text" id="province_state" value="{{ $user->province->name  }}" disabled>

                    </div>

                    <div>
                        <label for="postal_code">Postal Code:</label>
                        <input type="text" id="postal_code" value="{{ $user->postal_code }}" disabled>
                    </div>

                    <div>
                        <label for="country">Country:</label>
                        <input type="text" id="country"  value="{{$user->country }}" disabled>

                    </div>

                    <input type="hidden" id="sub_total" name="sub_total" value="{{$price}}">
                    <input type="hidden" id="pst" name="gst" value="{{number_format($gstAmount, 2)}}">
                    <input type="hidden" id="pst" name="pst" value="{{number_format($pstAmount, 2)}}">
                    <input type="hidden" id="shipping_cost" name="shipping_cost" value="{{$shipping_cost}}">
                    <input type="hidden" id="total" name="total" value="{{ $finalPrice}}">
                    @if (!empty($discount))
                        <input type="hidden"  name="promo_code" value="{{ $discount->promo_code}}">
                    @endif
                    <div class="card-payment">

                        <h3>Card Payment</h3>

                        @csrf
                        <label for="card_num">Card Number:</label>
                        <input type="text" id="card_num" name="card_num" placeholder="Enter card number" required>
                        <div class="dateContent">

                            <label for="expiry-month">Expiry Month:</label>
                            <select id="expiry-month" name="expiry-month" placeholder="MM">
                                <?php
                                // Generate options for months
                                for ($month = 1; $month <= 12; $month++) {
                                    $monthName = date('F', mktime(0, 0, 0, $month, 1));
                                    $monthInput = $month;
                                    if ($monthInput < 10) {
                                        $monthInput = "0" . $month;
                                    }
                                    echo '<option value="' . $monthInput . '">' . $monthName . '</option>';
                                }
                                ?>
                            </select>

                            <label for="expiry-year">Expiry Year:</label>
                            <select id="expiry-year" name="expiry-year">
                                <?php
                                // Generate options for years
                                for ($year = 22; $year <= 32; $year++) {
                                    $yearInput = $year;
                                    echo '<option value="' . $yearInput . '">' . $yearInput . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <label class="cvv-label" for="cvv" hidden>CVV:</label>
                        <input id="cvv" type="text" id="cvv" name="cvv" placeholder="cvv" maxlength="4" required>
                        <select id="card_type" name="card_type">
                            <option value="visa">Visa</option>
                            <option value="mastercard">Mastercard</option>
                            <option value="amex">American Express</option>
                        </select>
                        <!-- <input type="submit" value="Submit Payment"> -->

                    </div>
                    <button type="submit">Place Order</button>
                </div>





            </form>
        </div>
    </div>



</div>

@endsection