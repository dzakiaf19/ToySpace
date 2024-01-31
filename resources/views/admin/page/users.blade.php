@extends('admin.index_master')
@section('content')
    <main class="main-content position-relative border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0 font-weight-bolder d-flex justify-content-between">
                            <h6>All Orders</h6>
                            <button type="button button-add" onclick="location.href='{{ route('addAdmin') }}'"
                                class="btn btn-primary"
                                style="background: #344767; border: 1px solid #24263D; color: #FFFDF4; shadow: none;">Add
                                Users</button>
                        </div>
                        <div class="card-body px-0 pt-3 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-secondary text-xxs font-weight-bolder opacity-7">
                                                No</th>
                                            <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Name</th>
                                            <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Email</th>
                                            <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Phone</th>
                                            <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach (App\Models\User::role('admin')->get() as $admin)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ $i++ }}</span>
                                                    </div>
                                                </td>
                                                <td class="text-sm">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $admin->firstName . ' ' . $admin->lastName }}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $admin->email }}</span>
                                                </td>
                                                <td class="text-sm">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $admin->phone }}</span>
                                                </td>
                                                <td class="text-sm">
                                                    <a href="{{route('viewAdmin', ['admin' => $admin])}}" type="button" rel="tooltip" class="btn btn-icon btn-simple"
                                                        style="background-color:#2CC83C; color:#fff; padding: 10px 15px;"
                                                        data-original-title="" title="">
                                                        <i class="fa-regular fa-eye"></i>
                                                    </a>
                                                    <button type="button" rel="tooltip" class="btn btn-icon btn-simple"
                                                        style="background-color:#FFC93F; color:#fff; padding: 10px 15px;"
                                                        data-original-title="" title="">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" class="btn btn-icon btn-simple"
                                                        style="background-color:#DD322B; color:#fff;padding: 10px 15px;"
                                                        data-toggle="modal" data-target="#deleteModal{{ $admin->id }}">
                                                        <i class="fa-regular fa-trash-can"></i>
                                                    </button>

                                                    <div class="modal fade" id="deleteModal{{ $admin->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteModalLabel">Delete
                                                                        Admin
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
                                                                    <a href="{{ route('deleteAdmin', ['admin' => $admin]) }}"
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
