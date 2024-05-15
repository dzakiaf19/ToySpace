@extends('toyspace.index_master')
@section('title', 'TOYSPACE. INC | Checkout Product')

@section('content')

    <main id="checkout" class="checkout">
        <section id="title-cart" class="title-cart">
            <div class="container">
                <h3>Checkout & Payment</h3>
            </div>
        </section>
        <section id="info" class="info">
            <div class="container">
                <div class="billings-det">
                    <div class="title">Alamat pengiriman :</div>
                    <div class="alamat-pengiriman">
                        <div class="lol">
                            <h4>{{ $address->nama . ' (+62)' . $address->phone }}</h4>
                            <h4>{{ $address->alamat_lengkap . ', ' . $address->kota . ', ' . $address->provinsi . ' (' . $address->kode_pos . ')' }}
                            </h4>
                        </div>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#pilihalamat"
                            class="btn btn-simple">Ubah Alamat</button>
                        <div class="modal fade" id="pilihalamat" aria-hidden="true"
                            aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalToggleLabel">Pilih Alamat</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @foreach ($alamat as $pilih)
                                            <div class="row mb-3">
                                                <div class="col-10">
                                                    <h4>{{ $pilih->nama . ' (+62)' . $pilih->phone }}</h4>
                                                    <h4>{{ $pilih->alamat_lengkap . ', ' . $pilih->kota . ', ' . $pilih->provinsi . ' (' . $pilih->kode_pos . ')' }}
                                                </div>
                                                <div class="col-2">
                                                    <a class="btn btn-simple form-control"
                                                        href="{{ route('checkoutProduct', [Auth::user()->id, $pilih->id]) }}">Pilih</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-simple" data-bs-target="#formtambahalamat"
                                            data-bs-toggle="modal" data-bs-dismiss="modal">Tambah Baru</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="formtambahalamat" aria-hidden="true"
                            aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalToggleLabel2">Isi Alamat Baru</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('address.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="nama" class="col-form-label">Nama:</label>
                                                        <input required type="text" name="nama" class="form-control"
                                                            id="nama"
                                                            value="{{ Auth::user()->firstName . ' ' . Auth::user()->lastName }}">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="phone" class="col-form-label">No HP:</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="inputGroup-sizing-default"
                                                                style="background-color: #e9ecef;">+62</span>
                                                            <input required type="text" name="phone"
                                                                class="form-control" aria-label="Sizing example input"
                                                                aria-describedby="inputGroup-sizing-default" maxlength="11"
                                                                value="{{ Auth::user()->phone }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label for="province">Pilith Provinsi</label>
                                                        <select required name="provinsi" id="provinsi"
                                                            class="form-control">
                                                            <option value=""></option>
                                                            @foreach ($provinces as $province)
                                                                <option value="{{ $province['province_id'] }}">
                                                                    {{ $province['province'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="city">Pilith Kota</label>
                                                        <select required name="kota" id="city" class="form-control">
                                                            <option value=""></option>
                                                            @foreach ($cities as $city)
                                                                <option value="{{ $city['city_id'] }}">
                                                                    {{ $city['city_name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="kode-pos">Kode Pos</label>
                                                        <input required name="kode_pos" type="text" maxlength="6"
                                                            class="form-control" id="kode-pos" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="alamat" class="col-form-label">Detail Alamat :</label>
                                                <textarea required name="alamat_lengkap" id="alamat" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="cart-total" class="cart-total">
                    <form action="{{ route('paymentProduct', [Auth::user()->id, $address]) }}" method="POST">
                        @csrf
                        <div class="col-12 titles sub-tot">
                            <h4>Order Detail</h4>
                            <input type="hidden" name="dsad" value="dsak">
                        </div>
                        <div class="body">
                            <div class="shipping">
                                <h3>Product :</h3>
                            </div>
                            @php
                                $subtot = 0;
                            @endphp
                            @foreach ($carts as $key => $item)
                                <div class="sub-tot d-flex">
                                    <div class="col-6" style="padding:0">
                                        <h5>{{ $item->product->name . ' (x' . $item->quantity . ')' }}</h5>
                                    </div>
                                    <div class="col-6 mb-2" style="text-align:end; padding:0">
                                        <h5>Rp {{ $item->product->price * $item->quantity }}</h5>
                                        <input type="hidden" disabled class="form-control"
                                            value="{{ $item->product->price * $item->quantity }}">
                                        @php
                                            $subtot = $subtot + $item->product->price * $item->quantity;
                                        @endphp
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="body sub-tot d-flex">
                            <!-- <div class="col-4 title">Subtotal</div>
                                                                    <div class="col-4 harga">Rp 189.999</div> -->

                            <h5>Subtotal</h5>
                            <h5>Rp {{ $subtot }}</h5>
                        </div>
                        <div class="body sub-tot d-flex" style="border: none;">
                            {{-- <h5>Shipping</h5> --}}
                            <label for="ongkit">Shipping</label>
                            <div class="col-6">
                                <select required id="ongkir" class="form-control" name="ongkir" id="">
                                    <option value=""></option>
                                    @foreach ($costs as $cost)
                                        <option value='{"nama":"{{$cost['description']}}","harga":{{ $cost['cost'][0]['value']}}}'>
                                            {{ $cost['description'] . ' (' . $cost['service'] . ') ' . $cost['cost'][0]['etd'] . ' hari' }}
                                            - RP. {{ $cost['cost'][0]['value'] }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- <div class="body  sub-tot d-flex" style="border: none;">
                        <h5 style="font-weight:bold;">Total</h5>
                        <h5>Rp 212.999</h5>
                    </div> --}}
                        <div class="">
                            <button type="submit" rel="tooltip" class="btn btn-full" data-original-title=""
                                title="">
                                Check Out
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

@endsection
