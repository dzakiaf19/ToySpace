@extends('admin.index_master')
@section('content')
    <main class="main-content position-relative border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0 font-weight-bolder d-flex justify-content-between">
                            <h6>All Category</h6>
                        </div>
                        <form action="{{ route('category.store') }}" method="post">
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
                            <div class="row" style="margin: 16px 0 16px 12px">
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <input name="name" type="text" class="form-control"
                                            id="exampleFormControlInput1" placeholder="Add Category Name">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-primary"
                                        style="padding: 8px 14px; background: #344767; color: #FFFDF4;"
                                        style="background:transparent; border: 1px solid #24263D; color: #24263D;">Add
                                        Category</button>
                                </div>
                            </div>
                        </form>
                        <div class="card-body px-1 pt-0 pb-2 mb-2">
                            <div class="table-responsive p-0">
                                @if (Session::has('success'))
                                    <div class="alert alert-success" role="alert" id="success-alert">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                style="padding-right:0">
                                                No</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                                style="padding-right:0">
                                                Category Name</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                                style="padding-right:0">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($category as $key => $cat)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ $i++ }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $cat->name }}</span>
                                                </td>
                                                <td class="text-sm">
                                                    <button type="button" rel="tooltip" class="btn btn-icon btn-simple"
                                                        style="background-color:#FFC93F; color:#fff; padding: 10px 15px;"
                                                        data-toggle="modal" data-target="#editModal{{ $cat->id }}">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal{{ $cat->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                        Category</h5>
                                                                    <button type="button" class="close" style="border:none; font-size:24px; background: transparent;"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>

                                                                <form
                                                                    action="{{ route('category.edit', ['category' => $cat]) }}"
                                                                    method="post">
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
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <input name="name" type="text"
                                                                                class="form-control"
                                                                                id="exampleFormControlInput1"
                                                                                placeholder="Category Name"
                                                                                value="{{ $cat->name }}">
                                                                        </div>
                                                                    </div>


                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary"
                                                                            style="padding: 8px 14px; background: #344767; color: #FFFDF4;">Save</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button type="button" rel="tooltip" class="btn btn-icon btn-simple"
                                                        style="background-color:#DD322B; color:#fff;padding: 10px 15px;"
                                                        data-toggle="modal" data-target="#deleteModal{{ $cat->id }}">
                                                        <i class="fa-regular fa-trash-can"></i>
                                                    </button>

                                                    <div class="modal fade" id="deleteModal{{ $cat->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteModalLabel">Delete
                                                                        Category
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        style="border:none; font-size:24px; background: transparent;"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <a href="{{ route('category.destroy', ['category' => $cat]) }}"
                                                                        class="btn"
                                                                        style="background: #DD322B; color: #fff;">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
