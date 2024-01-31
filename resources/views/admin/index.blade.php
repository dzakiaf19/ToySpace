@extends('admin.index_master')
@section('content')
<div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 font-weight-bold">Product Sold</p>
                            <h5 class="font-weight-bolder" style="font-size: 35px;">
                                12
                            </h5>
                            <!-- <p class="mb-0">
                                <span class="text-success text-sm font-weight-bolder">+55%</span>
                                since yesterday
                            </p> -->
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape shadow-primary text-center rounded-circle" style="background: #24263D;">
                            <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 font-weight-bold">Out of Stock</p>
                            <h5 class="font-weight-bolder" style="font-size: 35px;">
                                5
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape shadow-danger text-center rounded-circle" style="background: #FDA72C;">
                            <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 font-weight-bold">Processed</p>
                            <h5 class="font-weight-bolder" style="font-size: 35px;">
                                28
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape shadow-success text-center rounded-circle" style="background: #539EBE;">
                            <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 font-weight-bold">Not Paid</p>
                            <h5 class="font-weight-bolder" style="font-size: 35px;">
                                2
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape shadow-warning text-center rounded-circle" style="background: #D5381C;">
                            <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card ">
            <div class="card-header pb-0 p-3">
                <div class="d-flex justify-content-between">
                    <h6 class="mb-2" style="font-weight:bold;">Transactions</h6>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>1</td>
                            <td>The Armored Helicopter</td>
                            <td>2</td>
                            <td>Rp 59.500</td>
                            <td>Rp 119.000</td>
                            <td class="td-actions text-center">
                                <button type="button" rel="tooltip" class="btn btn-icon btn-simple" style="background-color:#FFC93F; color:#fff; padding: 10px 15px;"
                                    data-original-title="" title="">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button type="button" rel="tooltip" class="btn btn-icon btn-simple" style="background-color:#DD322B; color:#fff; padding: 10px 15px;"
                                    data-original-title="" title="">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td>2</td>
                            <td>The Armored Helicopter</td>
                            <td>2</td>
                            <td>Rp 59.500</td>
                            <td>Rp 119.000</td>
                            <td class="td-actions text-center">
                                <button type="button" rel="tooltip" class="btn btn-icon btn-simple" style="background-color:#FFC93F; color:#fff; padding: 10px 15px;"
                                    data-original-title="" title="">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button type="button" rel="tooltip" class="btn btn-icon btn-simple" style="background-color:#DD322B; color:#fff;padding: 10px 15px;"
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
@endsection
