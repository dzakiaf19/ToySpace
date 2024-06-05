<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Midtrans\Config;
use Illuminate\Http\Request;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function callback(Request $request)
    {
        $payload = $request->all();

        dd($payload);

        // //kofigurasi midtrans
        // Config::$serverKey = config('services.midtrans.serverKey');
        // Config::$isProduction = config('services.midtrans.isProduction');
        // Config::$isSanitized = config('services.midtrans.isSanitized');
        // Config::$is3ds = config('services.midtrans.is3ds');

        // //instance midtrans notif
        // $notification = new Notification();

        // //assign variable
        // $status = $notification->transaction_status;
        // $type = $notification->payment_type;
        // $fraud = $notification->fraud_status;
        // $order_id = $notification->order_id;

        // //get transaction id
        // $order = explode('-', $order_id);

        // //cari transaksi
        // $transaction = Order::findOrFail($order[1]);

        // //handle notif
        // if ($status == 'capture') {
        //     if ($type == 'gopay') {
        //         if ($fraud == 'challange') {
        //             $transaction->status = 'PENDING';
        //         }else{
        //             $transaction->status = 'SUCCESS';
        //         }
        //     }else if ($type == 'bank_transfer') {
        //         if ($fraud == 'challange') {
        //             $transaction->status = 'PENDING';
        //         }else{
        //             $transaction->status = 'SUCCESS';
        //         }
        //     }else if ($type == 'bca_va') {
        //         if ($fraud == 'challange') {
        //             $transaction->status = 'PENDING';
        //         }else{
        //             $transaction->status = 'SUCCESS';
        //         }
        //     }
        // }else if($status == 'settlement'){
        //     $transaction->status = 'SUCCESS';
        // }else if($status == 'pending'){
        //     $transaction->status = 'PENDING';
        // }else if($status == 'deny'){
        //     $transaction->status = 'PENDING';
        // }else if($status == 'expired'){
        //     $transaction->status = 'CANCELLED';
        // }else if($status == 'cancel'){
        //     $transaction->status = 'PENDING';
        // }

        // //simpan transaksi
        // $transaction->save();

        // return response()->json([
        //     'meta' => [
        //         'code' => 200,
        //         'message' => 'Midtrans Notification Success!'
        //     ],
        // ]);
    }
}
