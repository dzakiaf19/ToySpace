@extends('admin.index_master')
@section('content')
<main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 font-weight-bolder d-flex justify-content-between">
                        <h6>Edit Products</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2" style="margin: 20px 24px 20px 24px">
                        <form enctype="multipart/form-data" method="post" action="{{ route('updateProduct', ['product' => $product]) }}">
                            @csrf
                            @method('put')
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name" style="font-size:12px; color: #344767;">Product Name</label>
                                        <input type="text" value="{{$product->name}}" name="name" class="form-control" id="exampleFormControlInput1"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="category" style="font-size:12px; color: #344767;">Category</label>
                                        <div class="select-category">
                                            <select name="category_id" id="category" style="width:100%; height: 40px; border-radius: 0.5rem; border-color: #d2d6da;">
                                                @foreach ($cat as $category)
                                                    <option value="{{ $category->id }}" {{ ($category->id == $product->cat_id) ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name" style="font-size:12px; color: #344767;">Price</label>
                                        <input type="number" value="{{$product->price}}" name="price" class="form-control" id="exampleFormControlInput1"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name" style="font-size:12px; color: #344767;">Stock</label>
                                        <input type="number" value="{{$product->stock}}" name="stock" class="form-control" id="exampleFormControlInput1"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name" style="font-size:12px; color: #344767;">Description</label>
                                        <textarea class="form-control"  name="desc" id="exampleFormControlTextarea1" rows="3"
                                            placeholder="">{{$product->desc}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-12 mt-2">
                                    <div class="form-group"
                                        style="border:1px solid #717E95; border-style: dashed; padding: 20px">
                                        <input style="width: 100%;" type="file" id="fileUpload" name="images[]" multiple
                                            accept="image/*">
                                    </div>
                                </div>
                            </div> -->
                            <div class="row">
                                <!-- <div class="col-md-12 mt-2 mb-3 add-image"
                                    onclick="document.getElementById('imgUpload').click()" style="cursor: pointer;"> -->
                                <div class="col-md-12 mt-2 mb-3 add-image">
                                    <div id="dropBox" class="form-group"
                                        style="border:1px solid #717E95; border-radius: 10px; border-style: dashed; padding: 20px 20px 0; margin:0;">
                                        <input type="file" name="images[]" id="imgUpload" multiple accept="image/*"
                                            onchange="filesManager(this.files)">
                                        <label class="button" for="imgUpload"><i class="fa-regular fa-image"></i> Add
                                            Images (0/9)</label>
                                        <div id="gallery"></div>
                                    </div>
                                </div>
                                <p style="font-size: 12px;">*If you want to update, you have to re-upload the image</p>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit"
                                        class="btn btn-primary"
                                        style="background:#24263D; color: #FFF; width:100%; box-shadow: none; margin: 10px 0">Add
                                        Products</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
