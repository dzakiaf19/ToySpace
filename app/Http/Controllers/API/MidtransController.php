<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Midtrans\Config;
use Illuminate\Http\Request;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function updateqty(Order $transaction)
    {
        $OrderDetails = OrderDetail::where('order_id', $transaction->id)->get();

        foreach ($OrderDetails as $orderitem) {
            $quantity = $orderitem->qty;
            $product = Product::findOrFail($orderitem->product_id);

            $product_quantity = $product->stock + $quantity;
            $product->update(['stock' => $product_quantity]);
        }
    }

    public function callback()
    {
        //kofigurasi midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        //instance midtrans notif
        $notification = new Notification();

        //assign variable
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        //get transaction id
        $order = explode('-', $order_id);

        //cari transaksi
        $transaction = Order::findOrFail($order[1]);

        //handle notif
        if ($status == 'capture') {
            if ($type == 'gopay') {
                if ($fraud == 'deny') {
                    $this->updateqty($transaction);
                    $transaction->status = 'CANCELLED';
                } else {
                    $transaction->status = 'SUCCESS';
                    $transaction->payment_type = 'Gopay/Qris';
                }
            } else if ($type == 'bank_transfer') {
                if ($fraud == 'deny') {
                    $this->updateqty($transaction);
                    $transaction->status = 'CANCELLED';
                } else {
                    $transaction->status = 'SUCCESS';
                    $transaction->payment_type = 'Bank Transfer';
                }
            }
        } else if ($status == 'settlement') {
            $transaction->status = 'SUCCESS';
            if ($type == 'qris') {
                $transaction->payment_type = 'Gopay/Qris';
            } else if ($type == 'bank_transfer') {
                $transaction->payment_type = 'Bank Transfer';
            }
        } else if ($status == 'pending') {
            $transaction->status = 'PENDING';
        } else if ($status == 'deny') {
            $this->updateqty($transaction);
            $transaction->status = 'CANCELLED';
        } else if ($status == 'expired') {
            $this->updateqty($transaction);
            $transaction->status = 'CANCELLED';
        } else if ($status == 'cancel') {
            $this->updateqty($transaction);
            $transaction->status = 'CANCELLED';
        }

        //simpan transaksi
        $transaction->save();

        return response()->json([
            'meta' => [
                'code' => 200,
                'message' => 'Midtrans Notification Success!'
            ],
        ]);
    }
}
