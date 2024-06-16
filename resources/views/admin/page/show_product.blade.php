@extends('admin.index_master')
@section('content')
    <main class="main-content position-relative border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0 font-weight-bolder d-flex justify-content-between">
                            <h6>All Products</h6>
                            <button type="button button-add" onclick="location.href='{{ route('product.create') }}'"
                                class="btn btn-primary"
                                style="background: #344767; border: 1px solid #24263D; color: #FFFDF4; shadow: none;">Tambah Produk</button>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                @if (Session::has('success'))
                                    <div class="alert alert-success" role="alert" id="success-alert">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                No</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Product Name</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Quantity</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Price</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @forelse ($product as $key => $prod)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ $i++ }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $prod->name }}</span>
                                                </td>
                                                <td class="text-sm">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $prod->stock }}</span>
                                                </td>
                                                <td class="text-sm">
                                                    <span class="text-secondary text-xs font-weight-bold">Rp
                                                        {{ $prod->price }}</span>
                                                </td>
                                                <td class="text-sm">
                                                    <a href="{{ route('product.images.index', ['product' => $prod]) }}"
                                                        rel="tooltip" class="btn btn-icon btn-simple"
                                                        style="background-color:#3f92ff; color:#fff; padding: 10px 15px;"
                                                        data-original-title="" title="">
                                                        <i class="fa-regular fa-image"></i>
                                                    </a>
                                                    <a href="{{ route('product.edit', ['product' => $prod]) }}"
                                                        rel="tooltip" class="btn btn-icon btn-simple"
                                                        style="background-color:#FFC93F; color:#fff; padding: 10px 15px;"
                                                        data-original-title="" title="">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </a>
                                                    <a href="{{ route('product.destroy', ['product' => $prod]) }}"
                                                        rel="tooltip" class="btn btn-icon btn-simple"
                                                        style="background-color:#DD322B; color:#fff;padding: 10px 15px;"
                                                        data-confirm-delete="true">
                                                        <i class="fa-regular fa-trash-can" data-confirm-delete="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="text-center">
                                                <td>
                                                    Kosong
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $product->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
