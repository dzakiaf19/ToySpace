<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-header text-center">
                <h1>Invoice</h1>
                <p>{{ $order->created_at->format('d M Y') }}</p>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <p><strong>Order ID:</strong> ToySpace-{{ $order->id }}</p>
                    <p><strong>Customer Name:</strong> {{ $order->name }}</p>
                    <p><strong>Customer Email:</strong> {{ $order->email }}</p>
                    <p><strong>Customer Phone:</strong> {{ $order->phone }}</p>
                    <p><strong>Customer Address:</strong> {{ $order->address }}</p>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->order_details as $detail)
                            <tr>
                                <td>{{ $detail->product->name }}</td>
                                <td>{{ $detail->qty }}</td>
                                <td>{{ $detail->product->price }}</td>
                                <td>{{ $detail->qty * $detail->product->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-end">
                    <p class="h5"><strong>Subtotal:</strong> {{ $order->total_price - $order->ongkir_price }}</p>
                    <p class="h5"><strong>Shipping Cost:</strong> {{ $order->ongkir_price }}</p>
                    <p class="h5"><strong>Total Amount:</strong> {{ $order->total_price }}</p>
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('invoice.pdf', $order) }}" class="btn btn-primary">Download PDF</a>
                </div>
            </div>
            <div class="card-footer text-center">
                <p>Thank you for your order!</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script></body>

</html>
