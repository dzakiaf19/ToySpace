@extends('toyspace.index_master')
@section('title', 'TOYSPACE. INC | Shop Product')

@section('content')

    <main id="shop_cart_page" class="shop_cart_page">
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="">ini breadcrumbs</a>
                    </li>
                </ol>
            </div>
        </section><!-- End Breadcrumbs -->
        <section class="detail_cart">
            <div class="container">
                <form id="cartForm"
                    action="{{ route('checkoutProduct', [Auth::user()->id, 'address' => $alamat->id ?? '']) }}"
                    method="GET">
                    @csrf
                    <div class="head-cart d-flex">
                        <div class="col-1">
                            <h4><input type="checkbox" id="checkAll"></h4>
                        </div>
                        <div class="col-3">
                            <h4>Produk</h4>
                        </div>
                        <div class="col-3 d-flex justify-content-center align-item-center">
                            <h4>Kuantitas</h4>
                        </div>
                        <div class="col-3 d-flex justify-content-center align-item-center">
                            <h4>Total Harga</h4>
                        </div>
                        <div class="col-2 d-flex justify-content-center align-item-center">
                            <h4>Aksi</h4>
                        </div>
                    </div>
                    @forelse($carts as $item)
                        <div class="body-cart card">
                            <div class="card-body d-flex">
                                <div class="col-1 d-flex align-items-center">
                                    <input type="checkbox" name="items[]" value="{{ $item->id }}"
                                        data-price="{{ $item->product->price * $item->quantity }}">
                                </div>
                                <div class="col-md-4 d-flex">
                                    <div class="image" style="padding-right: 5px">
                                        <img src="{{ $item->product->images()->exists() ? Storage::url($item->product->images->first()->path) : 'https://img.freepik.com/free-photo/abstract-textured-backgound_1258-30538.jpg?w=740&t=st=1717040880~exp=1717041480~hmac=48d946a95d70e6d9bdcaf19b81aaf4e71dce68fc0d9ab5a3109b75929f23c4d8' }}"
                                            class="cart-img-top">
                                    </div>
                                    <div class="desc">
                                        <div class="nameproduk">{{ $item->product->name }}</div>
                                        <div class="card-price">Rp{{ $item->product->price }}</div>
                                    </div>
                                </div>
                                <div class="col-md-3 quantity" style="display: flex; justify-content: flex-start;">
                                    <button class="decrease" type="button"
                                        onclick="updateQuantity('{{ $item->id }}', 'decrease')">-</button>
                                    <span class="count">{{ $item->quantity }}</span>
                                    <button class="increase" type="button"
                                        onclick="updateQuantity('{{ $item->id }}', 'increase')">+</button>
                                </div>
                                <div class="col-md-3">
                                    <h4>Rp {{ $item->product->price * $item->quantity }}</h4>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" onclick="removeItem('{{ $item->id }}')"
                                        class="btn btn-icon btn-simple">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="body-cart card">
                            <div class="card-body d-flex">
                                Kosong
                            </div>
                        </div>
                    @endforelse
                    {{-- <div id="shop-cart" class="shop-cart" style="padding:0;">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    @php
                                        $subtot = 0;
                                    @endphp
                                    @forelse($carts as $item)
                                        <tr class="">
                                            <td>{{ $item->product->name }}</td>
                                            <td>Rp {{ $item->product->price }}</td>
                                            <td class="quantity">
                                                <form style="display: contents"
                                                    action="{{ route('decreaseCart', $item->id) }}" method="POST">
                                                    @csrf
                                                    <button class="decrease">-</button>
                                                </form>
                                                <span class="count">{{ $item->quantity }}</span>
                                                <form style="display: contents"
                                                    action="{{ route('increaseCart', $item->id) }}" method="POST">
                                                    @csrf
                                                    <button class="increase">+</button>
                                                </form>
                                            </td>
                                            <td>Rp {{ $item->product->price * $item->quantity }}</td>
                                            @php
                                                $subtot = $subtot + $item->product->price * $item->quantity;
                                            @endphp
                                            <td class="td-actions">
                                                <form action="{{ route('deleteCart', $item->id) }}">
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
                                        <tr>
                                            <td>
                                                Kosong
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div> --}}

                    <div id="cart-total" class="cart-total">
                        <div class="col-12 titles sub-tot d-flex">
                            <h4>Cart Total : Rp <span id="cartTotal">0</span></h4>
                            @if ($alamat != null)
                                <button type="button" id="checkoutButton" onclick="submitCartForm()" class="btn btn-simple"
                                    disabled>
                                    Check Out
                                </button>
                            @else
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-simple" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    Check Out
                                </button>
                            @endif
                        </div>
                        {{-- <div class="body">
                        <div class="shipping">
                            <h3>Isi alamat pengiriman :</h3>
                        </div>
                        <div class="sub-tot d-flex">
                            <form action="">
                                <label for="destination">Pilith Kota</label>
                                <select name="" id="destination" class="form-control">
                                    <option value=""></option>
                                </select>
                            </form>
                        </div>
                    </div> --}}
                        {{-- <div class="body  sub-tot">
                        <h5>Change Shipping Address</h5>
                    </div>
                    <div class="body  sub-tot d-flex" style="border: none;">
                        <h5 style="font-weight: bold;">Total</h5>
                        <h5>Rp 212.999</h5>
                    </div> --}}
                    </div>
                </form>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Isi Alamat</h5>
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
                                                    <input required type="text" name="phone" class="form-control"
                                                        aria-label="Sizing example input"
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
                                                <select required name="provinsi" id="provinsi" class="form-control">
                                                    <option value=""></option>
                                                    @foreach ($provinces as $province)
                                                        <option value="{{ $province['province_id'] }}">
                                                            {{ $province['province'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <label for="city">Pilith Kota</label>
                                                <select required name="kota" id="city" class="form-control">
                                                    <option value=""></option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city['city_id'] }}">
                                                            {{ $city['city_name'] }}
                                                        </option>
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
                                        <label for="alamat" class="col-form-label">Detail Alamat
                                            :</label>
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

        </section>
    </main>

    <script>
        async function updateQuantity(itemId, action) {
            let url = '';
            if (action === 'decrease') {
                url = `/decreaseCart/${itemId}`;
            } else if (action === 'increase') {
                url = `/increaseCart/${itemId}`;
            }

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id: itemId
                    })
                });

                if (!response.ok) {
                    const errorData = await response.json();
                    throw new Error(errorData.message || 'Network response was not ok.');
                }

                const data = await response.json();
                console.log('Success:', data);
                location.reload(); // Reload the page to reflect the updated quantity
            } catch (error) {
                console.error('Error:', error);
                alert(error.message || 'Terjadi kesalahan. Silakan coba lagi.');
            }
        }

        async function removeItem(itemId) {
            try {
                const response = await fetch(`/deleteCart/${itemId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id: itemId
                    })
                });

                if (!response.ok) {
                    const errorData = await response.json();
                    throw new Error(errorData.message || 'Network response was not ok.');
                }

                const data = await response.json();
                console.log('Success:', data);
                location.reload(); // Reload the page to reflect the updated cart
            } catch (error) {
                console.error('Error:', error);
                alert(error.message || 'Terjadi kesalahan. Silakan coba lagi.');
            }
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkAll = document.getElementById('checkAll');
            const checkboxes = document.querySelectorAll('input[name="items[]"]');
            const checkoutButton = document.getElementById('checkoutButton');

            checkAll.addEventListener('change', function() {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
                updateTotal();
                toggleCheckoutButton();
            });

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    updateTotal();
                    toggleCheckoutButton();
                });
            });

            function updateTotal() {
                let total = 0;
                document.querySelectorAll('input[name="items[]"]:checked').forEach(checkbox => {
                    let price = Number(checkbox.getAttribute('data-price'));
                    if (!isNaN(price)) {
                        total += price;
                    }
                });
                document.getElementById('cartTotal').innerText = total.toLocaleString('id-ID');
            }

            function toggleCheckoutButton() {
                const anyChecked = document.querySelectorAll('input[name="items[]"]:checked').length > 0;
                if (anyChecked) {
                    checkoutButton.removeAttribute('disabled');
                } else {
                    checkoutButton.setAttribute('disabled', 'true');
                }
            }

            window.submitCartForm = function() {
                let form = document.getElementById('cartForm');
                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        let input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'selected_items[]';
                        input.value = checkbox.value;
                        form.appendChild(input);
                    }
                });
                form.submit();
            }

            // Initialize total and button state on page load
            updateTotal();
            toggleCheckoutButton();
        });
    </script>
@endsection
