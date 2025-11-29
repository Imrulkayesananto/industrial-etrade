@extends('layouts.frontend')
@section('frontend')



<!-- Start Checkout Area  -->
<div class="axil-checkout-area axil-section-gap">
    <div class="container">
        <form action="{{ route('frontend.checkout') }}#">
            <div class="row">
                <div class="col-lg-6">
                    <div class="axil-checkout-notice">
                        <div class="axil-toggle-box">
                            <div class="toggle-bar"><i class="fas fa-user"></i> Returning customer? <a
                                    href="javascript:void(0)" class="toggle-btn">Click here to login <i
                                        class="fas fa-angle-down"></i></a>
                            </div>
                            <div class="axil-checkout-login toggle-open">
                                <p>If you didn't Logged in, Please Log in first.</p>
                                <div class="signin-box">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <div class="form-group mb--0">
                                        <button type="submit" class="axil-btn btn-bg-primary submit-btn">Sign
                                            In</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="axil-toggle-box">
                            <div class="toggle-bar"><i class="fas fa-pencil"></i> Have a coupon? <a
                                    href="javascript:void(0)" class="toggle-btn">Click here to enter your code <i
                                        class="fas fa-angle-down"></i></a>
                            </div>

                            <div class="axil-checkout-coupon toggle-open">
                                <p>If you have a coupon code, please apply it below.</p>
                                <div class="input-group">
                                    <input placeholder="Enter coupon code" type="text">
                                    <div class="apply-btn">
                                        <button type="submit" class="axil-btn btn-bg-primary">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="axil-checkout-billing">
                        <h4 class="title mb--40">Billing details</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>First Name <span>*</span></label>
                                    <input type="text" id="first-name" placeholder="Adam"
                                        value="{{ auth('customer')->user()->name }}" name="fname">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Last Name <span>*</span></label>
                                    <input type="text" id="last-name" placeholder="John" name="lname">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" id="company-name">
                        </div>
                        <div class="form-group">
                            <label>Country/ Region <span>*</span></label>
                            <select id="Region">
                                <option value="bangladesh" selected>Bangladesh</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Street Address <span>*</span></label>
                            <input value="{{ auth('customer')->user()->address }}" type="text" id="address1"
                                class="mb--15" placeholder="House number and street name" name="address">
                            <input type="text" id="address2" placeholder="Apartment, suite, unit, etc. (optonal)">
                        </div>
                        <div class="form-group">
                            <label>Town/ City <span>*</span></label>
                            <input type="text" id="town" name="city">
                        </div>

                        <div class="form-group">
                            <label>Phone <span>*</span></label>
                            <input type="tel" id="phone" value="{{ auth('customer')->user()->phone }}" name="phone">
                        </div>
                        <div class="form-group">
                            <label>Email Address <span>*</span></label>
                            <input type="email" id="email" name="email">
                        </div>
                        <div class="form-group input-group">
                            <input type="checkbox" id="checkbox1" name="account-create">
                            <label for="checkbox1">Create an account</label>
                        </div>
                        <div class="form-group different-shippng">
                            <div class="toggle-bar">
                                <a href="javascript:void(0)" class="toggle-btn">
                                    <input type="checkbox" id="checkbox2" name="diffrent-ship">
                                    <label for="checkbox2">Ship to a different address?</label>
                                </a>
                            </div>
                            <div class="toggle-open">
                                <div class="form-group">
                                    <label>Country/ Region <span>*</span></label>
                                    <select id="Region">
                                        <option value="3">Australia</option>
                                        <option value="4">England</option>
                                        <option value="6">New Zealand</option>
                                        <option value="5">Switzerland</option>
                                        <option value="1">United Kindom (UK)</option>
                                        <option value="2">United States (USA)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Street Address <span>*</span></label>
                                    <input type="text" id="address1" class="mb--15"
                                        placeholder="House number and street name">
                                    <input type="text" id="address2"
                                        placeholder="Apartment, suite, unit, etc. (optonal)">
                                </div>
                                <div class="form-group">
                                    <label>Town/ City <span>*</span></label>
                                    <input type="text" id="town">
                                </div>
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" id="country">
                                </div>
                                <div class="form-group">
                                    <label>Phone <span>*</span></label>
                                    <input type="tel" id="phone">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Other Notes (optional)</label>
                            <textarea id="notes" rows="2"
                                placeholder="Notes about your order, e.g. speacial notes for delivery."></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="axil-order-summery order-checkout-summery">
                        <h5 class="title mb--20">Your Order</h5>
                        <div class="summery-table-wrap">
                            <table class="table summery-table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                    $totalPrice = 0
                                    @endphp
                                    @foreach ($carts as $cartItem)
                                    <tr class="order-product">
                                        <td>{{ $cartItem->product->title }} <span class="quantity">x{{ $cartItem->qty
                                                }}</span></td>
                                        @php
                                        $price = ($cartItem->product->selling_price && $cartItem->product->selling_price
                                        > 0?
                                        $cartItem->product->selling_price :
                                        $cartItem->product->price) * $cartItem->qty;
                                        $totalPrice += $price;
                                        @endphp
                                        <td>{{ number_format($price, 2) }}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td>
                                            <h4>Total Price</h4>
                                        </td>
                                        <td><b>{{ number_format($totalPrice,2) }}</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="order-payment-method">
                            <div class="single-payment">
                                <div class="input-group">
                                    <input type="radio" id="radio4" name="payment">
                                    <label for="radio4">Direct bank transfer</label>
                                </div>
                                <p>Make your payment directly into our bank account. Please use your Order ID as the
                                    payment reference. Your order will not be shipped until the funds have cleared in
                                    our account.</p>
                            </div>
                            <div class="single-payment">
                                <div class="input-group">
                                    <input type="radio" id="radio5" name="payment">
                                    <label for="radio5">Cash on delivery</label>
                                </div>
                                <p>Pay with cash upon delivery.</p>
                            </div>
                            <div class="single-payment">
                                <div class="input-group justify-content-between align-items-center">
                                    <input type="radio" id="radio6" name="payment" checked>
                                    <label for="radio6">Paypal</label>
                                    <img src="assets/images/others/payment.png" alt="Paypal payment">
                                </div>
                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.
                                </p>
                            </div>
                        </div>
                        <button id="sslczPayBtn" token="if you have any token validation" postdata=""
                            order="If you already have the transaction generated for current order"
                            endpoint="/pay-via-ajax"> Pay Now
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Checkout Area  -->
@push('js')


<script>
    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>
<script>
    var obj = {};

    $('#sslczPayBtn').click(function(){
        obj.cus_name = $(`input[name="fname"]`).val() + " " + $('input[name="lname"]').val() ;
        obj.cus_phone = $('input[name="phone"]').val();
        obj.cus_email = $('#email').val();
        obj.cus_addr1 = $('input[name="address"]').val();
        obj.amount = `{{ $totalPrice }}`;
        obj.city = $('input[name="city"]').val()
        $('#sslczPayBtn').prop('postdata', obj);
    })


       
</script>
@endpush
@endsection