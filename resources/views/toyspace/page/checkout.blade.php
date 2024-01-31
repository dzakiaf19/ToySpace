@extends('toyspace.index_master')
@section('title', 'TOYSPACE. INC | Checkout Product')

@section('content')

<main id="checkout" class="checkout">
    <section id="title-cart" class="title-cart">
        <div class="container">
            <h3>Checkout & Paymet</h3>
        </div>
    </section>
    <section id="info" class="info">
        <div class="container d-flex">
            <div class="billings-det">
                <div class="title">Billing Details</div>
                <form>
                    <div class="form-row" style="margin-top">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Recipient's Name</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Telephone</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="">
                    </div>
            </div>
            <div id="cart-total" class="cart-total">
                <div class="col-12 titles sub-tot">
                    <h4>Order Detail</h4>
                </div>
                <div class="body">
                    <div class="shipping">
                        <h3>Product :</h3>
                    </div>
                    <div class="sub-tot d-flex">
                        <div class="col-8" style="padding:0">
                            <h5>Hasbro Games Monopoli Classic Game - GCC1009</h5>
                        </div>
                        <div class="col-4" style="text-align:end; padding:0">
                            <h5>Rp 23.000</h5>
                        </div>
                    </div>
                </div>
                <div class="body sub-tot d-flex">
                    <!-- <div class="col-4 title">Subtotal</div>
                        <div class="col-4 harga">Rp 189.999</div> -->

                    <h5>Subtotal</h5>
                    <h5>Rp 189.999</h5>
                </div>
                <div class="body  sub-tot d-flex" style="border: none;">
                    <h5>Shipping</h5>
                    <h5>Rp 189.999</h5>
                </div>
                <div class="body  sub-tot d-flex" style="border: none;">
                    <h5 style="font-weight:bold;">Total</h5>
                    <h5>Rp 212.999</h5>
                </div>
                <div class="">
                    <button type="button" rel="tooltip" class="btn btn-full" data-original-title="" title="">
                        Check Out
                    </button>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
