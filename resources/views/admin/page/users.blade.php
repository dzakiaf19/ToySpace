@extends('admin.index_master')
@section('content')
    <main class="main-content position-relative border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0 font-weight-bolder d-flex justify-content-between">
                            <h6>Admin List</h6>
                            <button type="button button-add" onclick="location.href='{{ route('admin.create') }}'"
                                class="btn btn-primary"
                                style="background: #344767; border: 1px solid #24263D; color: #FFFDF4; shadow: none;">Tambah Admin</button>
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
                                        @foreach ($admin as $atmin)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ $i++ }}</span>
                                                    </div>
                                                </td>
                                                <td class="text-sm">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $atmin->firstName . ' ' . $atmin->lastName }}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $atmin->email }}</span>
                                                </td>
                                                <td class="text-sm">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">(+62){{ $atmin->phone }}</span>
                                                </td>
                                                <td class="text-sm">
                                                    <a href="{{route('admin.show', ['admin' => $atmin])}}" type="button" rel="tooltip" class="btn btn-icon btn-simple"
                                                        style="background-color:#2CC83C; color:#fff; padding: 10px 15px;"
                                                        data-original-title="" title="">
                                                        <i class="fa-regular fa-eye"></i>
                                                    </a>
                                                    <a href="{{route('admin.edit', ['admin' => $atmin])}}" type="button" rel="tooltip" class="btn btn-icon btn-simple"
                                                        style="background-color:#ffc400e8; color:#fff; padding: 10px 15px;"
                                                        data-original-title="" title="">
                                                        <i class="fa-regular fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('admin.destroy', ['admin' => $atmin]) }}"
                                                        rel="tooltip" class="btn btn-icon btn-simple"
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
