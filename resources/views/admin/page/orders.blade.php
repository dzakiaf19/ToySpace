@extends('admin.index_master')
@section('content')
<main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 font-weight-bolder d-flex justify-content-between">
                        <h6>All Orders</h6>
                    </div>
                    <div class="card-body px-0 pt-3 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Order Date</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Product Name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Quantity</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Total</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <span class="text-secondary text-xs font-weight-bold">1</span>
                                            </div>
                                        </td>
                                        <td class="text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">12/11/2023</span>
                                        </td>
                                        <td>
                                            <span class="text-secondary text-xs font-weight-bold">The Armored
                                                Helicopter</span>
                                        </td>
                                        <td class="text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">2</span>
                                        </td>
                                        <td class="text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">Rp 59.500</span>
                                        </td>
                                        <td class="text-sm">
                                            <button type="button" rel="tooltip" class="btn btn-icon btn-simple"
                                                style="background-color:#FFC93F; color:#fff; padding: 10px 15px;"
                                                data-original-title="" title="">
                                                <i class="fa-regular d fa-pen-to-square"></i>
                                            </button>
                                            <button type="button" rel="tooltip" class="btn btn-icon btn-simple"
                                                style="background-color:#DD322B; color:#fff;padding: 10px 15px;"
                                                data-original-title="" title="">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </button>
                                        </td>
                                    </tr>
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
