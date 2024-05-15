@extends('admin.index_master')
@section('content')
    <main class="main-content position-relative border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0 font-weight-bolder d-flex justify-content-between">
                            <h6>{{$product->name}} Images</h6>
                            <button type="button button-add" onclick="location.href='{{ route('product.images.create', $product) }}'"
                                class="btn btn-primary"
                                style="background: #344767; border: 1px solid #24263D; color: #FFFDF4; shadow: none;">Add
                                Products</button>
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
                                                Image</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Is Featured</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i =1;
                                        @endphp
                                        @foreach ($images as $image)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ $i++ }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <img style="max-width: 100px" src="{{Storage::url($image->path)}}" alt="">
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{$image->is_featured? 'Yes' : 'No'}}</span>
                                                </td>
                                                <td class="text-sm">
                                                    {{-- <a href="{{ route('product.images.index', ['product' => $prod]) }}"
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
                                                    </a> --}}
                                                    <a href="{{ route('images.destroy', ['image' => $image]) }}" rel="tooltip" class="btn btn-icon btn-simple"
                                                        style="background-color:#DD322B; color:#fff;padding: 10px 15px;"
                                                        data-confirm-delete="true">
                                                        <i class="fa-regular fa-trash-can" data-confirm-delete="true"></i>
                                                    </a>                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
