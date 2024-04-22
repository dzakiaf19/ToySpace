@extends('toyspace.index_master')
@section('title', 'TOYSPACE. INC | Shop Product')

@section('content')

    <main id="shop_cart_page" class="shop_cart_page">
        <section id="title-cart" class="title-cart">
            <div class="container">
                <h3>Shopping Cart</h3>
            </div>
        </section>
        <section class="detail_cart">
            <div class="container d-flex">
                <div id="shop-cart" class="shop-cart" style="padding:0;">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr class="">
                                    <th class="name-product">Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th class="sub-tot">Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($carts as $item)
                                    <tr class="">
                                        <td>{{ $item->product->name }}</td>
                                        <td>Rp {{ $item->product->price }}</td>
                                        <td class="quantity">
                                            <form style="display: contents" action="{{ route('decreaseCart', $item->id) }}"
                                                method="POST">
                                                @csrf
                                                <button class="decrease">-</button>
                                            </form>
                                            <span class="count">{{ $item->quantity }}</span>
                                            <form style="display: contents" action="{{ route('increaseCart', $item->id) }}"
                                                method="POST">
                                                @csrf
                                                <button class="increase">+</button>
                                            </form>
                                        </td>
                                        <td>Rp {{ $item->product->price * $item->quantity }}</td>
                                        <td class="td-actions">
                                            <form action="{{route('deleteCart', $item->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" rel="tooltip" class="btn btn-icon btn-simple"
                                                    data-original-title="" title="">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>Kosong</tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="cart-total" class="cart-total">
                    <div class="col-12 titles sub-tot">
                        <h4>Cart Total</h4>
                    </div>
                    <div class="body sub-tot d-flex">
                        <!-- <div class="col-4 title">Subtotal</div>
                                        <div class="col-4 harga">Rp 189.999</div> -->

                        <h5>Subtotal</h5>
                        <h5>Rp 189.999</h5>
                    </div>
                    <div class="body">
                        <div class="shipping">
                            <h3>Shipping :</h3>
                        </div>
                        <div class="sub-tot d-flex">
                            <h5>Shipping to Banyuwangi, Jawa Timur</h5>
                            <h5>Rp 23.000</h5>
                        </div>
                    </div>
                    <div class="body  sub-tot">
                        <h5>Change Shipping Address</h5>
                    </div>
                    <div class="body  sub-tot d-flex" style="border: none;">
                        <h5 style="font-weight: bold;">Total</h5>
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
