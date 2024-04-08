<?php

namespace App\Http\Controllers;

use App\Mail\OrderDetails;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Stripe;
use Stripe\StripeClient;
use Session;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Imagick;

class StripePaymentController extends Controller
{
    public function stripePayment(Request $request)
    {
        session()->put('metadara', json_encode($request->all()));
        // $qrCode = asset('/qr_code_images/QrCode-v8DHQJSmjl.jpg');

        // $email_data = ['qr_image'=> $qrCode];

        // $email = new OrderDetails($email_data);
        // Mail::to('saurabhk.cts@gmail.com')->send($email);
        // dd('Email Sent.');
        // echo"<pre>"; print_r($request->all()); die;
        $meta_data = $request->all();
        $note = isset($request->note) ? $request->note : '';
        if (isset($request->order_id)) {
            $order = DB::table('orders')
                ->where('orders.id', $request->order_id)
                ->join('products', 'orders.product_id', '=', 'products.id')
                ->join('shipping_addresses', 'orders.shipping_address_id', '=', 'shipping_addresses.id')
                ->select('products.name', 'orders.*', 'shipping_addresses.*', 'orders.id as order_id')
                ->first();
            $shiping_address_id = $order->shipping_address_id;
            $order_id = $request->order_id;

            $dataArr = [
                'price_data' => [
                    'currency'     => 'usd',
                    'product_data' => [
                        'name' => $order->name,
                        'images' => [url($order->product_image)]
                    ],
                    'unit_amount'  => str_replace('.0', '', $order->amount) * 100,
                ],
                'quantity'   => 1,
            ];
        } else {
            $order_id = null;
            $shiping_address_id = $request->default_address;
            $cartItems =  Cart::where('user_id', Auth::user()->id)->join('products', 'cart.product_id', '=', 'products.id')->get();
            if (count($cartItems) == 0) {
                return redirect()->back();
            }
            $dataArr = [];
            foreach ($cartItems as $item) {
                $data = [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' => $item->name,
                            'images' => [url($item->design_image)]
                        ],
                        'unit_amount'  => str_replace(".", "", ltrim($item->price, '$')),
                    ],
                    'quantity'   => $item->quantity,
                ];
                $dataArr[] = $data;
            }
        }

        \Stripe\Stripe::setApiKey(config('app.stripeSecret'));

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [$dataArr],
            'mode'        => 'payment',
            'success_url' => url('/save-order-detail' . '/' . $shiping_address_id . '?order_id=' . $order_id . '&note=' . $note . '&qr_display_option=' . $request->qr_display_option),
            'cancel_url'  => url('/checkout'),
        ]);

        // session()->put('meta_data', $meta_data);

        return redirect()->away($session->url);
    }
}
