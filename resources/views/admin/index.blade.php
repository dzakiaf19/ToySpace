@extends('admin.index_master')
@section('content')
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 font-weight-bold">Prdoduk Terjual</p>
                                <h5 class="font-weight-bolder" style="font-size: 35px;">
                                    {{ $totalProductsSold }}
                                </h5>
                                <!-- <p class="mb-0">
                                                                                            <span class="text-success text-sm font-weight-bolder">+55%</span>
                                                                                            since yesterday
                                                                                        </p> -->
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape shadow-primary text-center rounded-circle"
                                style="background: #24263D;">
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
                                <p class="text-sm mb-0 font-weight-bold">Produk Habis</p>
                                <h5 class="font-weight-bolder" style="font-size: 35px;">
                                    {{ $productsOutOfStock }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape shadow-danger text-center rounded-circle"
                                style="background: #FDA72C;">
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
                                <p class="text-sm mb-0 font-weight-bold">Pesanan Diproses</p>
                                <h5 class="font-weight-bolder" style="font-size: 35px;">
                                    {{ $totalOrderToProceed }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape shadow-success text-center rounded-circle"
                                style="background: #539EBE;">
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
                                    {{ $totalNotPaid }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape shadow-warning text-center rounded-circle"
                                style="background: #D5381C;">
                                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-12">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h6 class="text-capitalize">Sales overview</h6>
                    <p class="text-sm mb-0">
                        <i class="fa fa-arrow-up text-success"></i>
                        <span class="font-weight-bold">Sales by Product</span>
                    </p>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
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
                                <th>Order ID</th>
                                <th>Nama</th>
                                <th>Harga Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $key => $order)
                                <tr class="text-center">
                                    <td>ToySpace-{{ $order->id }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>Rp {{ $order->total_price }}</td>
                                    <td>
                                        @if ($order->status === 'PENDING')
                                            Belum Dibayar
                                        @elseif($order->status === 'SUCCESS')
                                            Pesanan Perlu Diproses
                                        @elseif($order->status === 'CANCELLED')
                                            Dibatalkan
                                        @elseif($order->status === 'SEND')
                                            Sedang Dikirim
                                        @elseif($order->status === 'FINISHED')
                                            Pesanan Selesai
                                        @else
                                            Status Tidak Dikenal
                                        @endif
                                    </td>
                                    <td class="td-actions text-center">
                                        @if ($order->status === 'SUCCESS' || $order->status === 'SEND')
                                            <button type="button" rel="tooltip" class="btn btn-icon btn-simple"
                                                style="background-color:#FFC93F; color:#fff; padding: 10px 15px;"
                                                data-bs-toggle="modal" title=""
                                                data-bs-target="#staticBackdrop{{ $key }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                                {{ $order->status === 'SEND' ? 'Ubah No Resi' : 'Tambahkan No Resi' }}
                                            </button>
                                            <div class="modal fade" id="staticBackdrop{{ $key }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Isi Alamat
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('order.resi', $order) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <label for="no_resi"
                                                                                class="col-form-label">Nomor Resi :
                                                                            </label>
                                                                            <input
                                                                                value="{{ $order->status === 'SEND' ? $order->no_resi : '' }}"
                                                                                required type="text" name="no_resi"
                                                                                class="form-control" id="nama">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($order->status === 'SEND')
                                            <a type="button" rel="tooltip" class="btn btn-icon btn-primary"
                                                style="color:#fff; padding: 10px 15px;" data-original-title=""
                                                href="https://cekresi.com/tracking/cek-resi-jne.php?noresi=+{{ $order->no_resi }}"
                                                target="_blank">
                                                Lacak
                                            </a>
                                        @endif
                                        <button type="button" rel="tooltip" class="btn btn-icon btn-success"
                                            style="color:#fff; padding: 10px 15px;" data-original-title=""
                                            title="">
                                            <i class="fa-regular fa-eye"></i>
                                        </button>
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
                    <div class="">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
    <script>
        // Ambil data dari PHP
        var months = @json($months);
        var revenues = @json($revenues);

        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
        new Chart(ctx1, {
            type: "bar",
            data: {
                labels: months,
                datasets: [{
                    label: "Monthly Revenue",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#5e72e4",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: revenues,
                    maxBarThickness: 6
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                        // min: 0
                    },
                },
            },
        });
    </script>
@endsection
