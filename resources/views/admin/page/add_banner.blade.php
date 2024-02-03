@extends('admin.index_master')
@section('content')
    <main class="main-content position-relative border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0 font-weight-bolder d-flex justify-content-between">
                            <h6>Add Banner</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2" style="margin: 20px 24px 20px 24px">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('storeProduct') }}">
                                @csrf
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" style="font-size:12px; color: #344767;">Banner
                                                Title</label>
                                            <input type="text" value="{{ old('name') }}" name="name"
                                                class="form-control" id="exampleFormControlInput1" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status" style="font-size:12px; color: #344767;">Status</label>
                                            <div class="select-category">
                                                <select name="status" id="status"
                                                    style="width:100%; height: 40px; border-radius: 0.5rem; border-color: #d2d6da;">
                                                    <option value=""></option>
                                                    <option value="active"
                                                        {{ old('status') == 'active' ? 'selected' : '' }}>
                                                        Active</option>
                                                    <option value="inactive"
                                                        {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                                        Inactive</option>
                                                </select>
                                            </div>
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
                                </div>
                                <div class="row">

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary"
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
