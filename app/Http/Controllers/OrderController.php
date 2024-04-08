<?php

namespace App\Http\Controllers;

use App\Mail\OrderDetails;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ShippingAddress;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function orderDetail($id)
    {
        $order = DB::table('orders')
            ->where('orders.id', $id)
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('shipping_addresses', 'orders.shipping_address_id', '=', 'shipping_addresses.id')
            ->select('products.name', 'users.*', 'orders.*', 'shipping_addresses.*', 'orders.id as order_id')
            ->first();
        $inscription_meta = json_decode($order->inscription_meta, true);
        return view('order.detail')->with(compact('order','inscription_meta'));
    }

    public function saveOrderDetail(Request $request, $id)
    {
        $note = isset($request->note) ? $request->note : 'No Additional Note';
        $meta_data1 = json_decode(session('metadara1'), true);
        $meta_data = json_decode(session('metadara'), true);
        $inscription_meta = session('metadara1');
        $shiping_charge = 100;
        if ($request->order_id == null) {
            $cartItems =  Cart::where('user_id', Auth::user()->id)->join('products', 'cart.product_id', '=', 'products.id')->get();
            foreach ($cartItems as $item) {
                $data = [
                    'user_id' => Auth::user()->id,
                    'shipping_address_id' => $id,
                    'product_id' => $item->product_id,
                    'qr_code_image' => $item->qr_code_image_url,
                    'qr_code_id' => $item->qr_code_id,
                    'product_image' => $item->design_image,
                    'amount' => (float)str_replace(".00", "", ltrim($item->price, '$')),
                    'shipping_charge' => $shiping_charge,
                    'quantity' => $item->quantity,
                    'currency' => 'usd',
                    'payment_method' => 'CARD',
                    'payment_status' => 'Paid',
                    'order_date' => Carbon::now(),
                    'additional_note' => $note,
                    'qr_display_option' => $request->qr_display_option,
                    // Additinal data
                    'inscription_meta' => @$inscription_meta,
                    'name_on_order' => $meta_data['name_on_order'] ? $meta_data['name_on_order'] : '',
                    'company_name' => $meta_data['company_name'] ? $meta_data['company_name'] : '',
                    'inscription_type' => $meta_data['inscription_type'] ? $meta_data['inscription_type'] : '',
                    'cemetry_location_name' => $meta_data['cemetry_location_name'] ? $meta_data['cemetry_location_name'] : '',
                    'cemetry_location_address' => $meta_data['cemetry_location_address'] ? $meta_data['cemetry_location_address'] : '',
                    'cemetry_location_phone' => $meta_data['cemetry_location_phone'] ? $meta_data['cemetry_location_phone'] : '',
                    'inscription2_endearment' => $meta_data['inscription2_endearment'] ? $meta_data['inscription2_endearment'] : '',
                    'customendearment2' => $meta_data['customendearment2'] ? $meta_data['customendearment2'] : '',
                    'inscription2_firstname' => $meta_data['inscription2_firstname'] ? $meta_data['inscription2_firstname'] : '',
                    'inscription2_middlename' => $meta_data['inscription2_middlename'] ? $meta_data['inscription2_middlename'] : '',
                    'inscription2_lastname' => $meta_data['inscription2_lastname'] ? $meta_data['inscription2_lastname'] : '',
                    'inscription2_dob' => $meta_data['inscription2_dob'] ? $meta_data['inscription2_dob'] : '',
                    'inscription2_dd' => $meta_data['inscription2_dd'] ? $meta_data['inscription2_dd'] : '',
                    'inscription2_epitaph' => $meta_data['inscription2_epitaph'] ? $meta_data['inscription2_epitaph'] : '',
                    'inscription2_emblem' => $meta_data['inscription2_emblem'] ? $meta_data['inscription2_emblem'] : '',
                    'design_number' => $meta_data['design_number'] ? $meta_data['design_number'] : '',
                    'sanded_panel' => $meta_data['sanded_panel'] ? $meta_data['sanded_panel'] : '',
                    'sanded_artwork' => $meta_data['sanded_artwork'] ? $meta_data['sanded_artwork'] : '',
                    'shape' => $meta_data['shape'] ? $meta_data['shape'] : '',
                    'size' => $meta_data['size'] ? $meta_data['size'] : '',
                    'customshapesize' => $meta_data['customshapesize'] ? $meta_data['customshapesize'] : '',
                    'color' => $meta_data['color'] ? $meta_data['color'] : '',
                    'polish' => $meta_data['polish'] ? $meta_data['polish'] : '',
                    'polishnote' => $meta_data['polishnote'] ? $meta_data['polishnote'] : '',
                    'engraving_depth' => $meta_data['engraving_depth'] ? $meta_data['engraving_depth'] : '',
                    'base_size' => $meta_data['base_size'] ? $meta_data['base_size'] : '',
                    'base_size_continued' => $meta_data['base_size_continued'] ? $meta_data['base_size_continued'] : '',
                    'photo_shape' => $meta_data['photo_shape'] ? $meta_data['photo_shape'] : '',
                    'photo_size' => $meta_data['photo_size'] ? $meta_data['photo_size'] : '',
                    'photo_color' => $meta_data['photo_color'] ? $meta_data['photo_color'] : '',
                    'photo_cropping' => $meta_data['photo_cropping'] ? $meta_data['photo_cropping'] : '',
                    'photo_background' => $meta_data['photo_background'] ? $meta_data['photo_background'] : '',
                    'basecolor' => $meta_data['basecolor'] ? $meta_data['basecolor'] : '',
                    'basecolor_additional_note' => $meta_data['basecolor_additional_note'] ? $meta_data['basecolor_additional_note'] : '',
                ];
                DB::table('orders')->insert($data);

                $product = Product::where('id', $item->product_id)->first();
                $user = User::where('id', Auth::id())->first();
                $shiping_address = ShippingAddress::where('id', $id)->first();

                $email_data = [
                    'product_image' => asset($item->design_image),
                    'product_name' => $product->name,
                    'quantity' => $item->quantity,
                    'amount' => $item->price,
                    'order_date' => date('d M Y', strtotime(Carbon::now())),
                    'user_image' => asset('profile_image/'.$user->profile_pic),
                    'user_name' => $user->name,
                    'user_email' => $user->email,
                    'mobile_no' => $user->mobile_number,
                    'qr_code_image' => asset($item->qr_code_image_url),
                    'qr_code_detail_link' => asset('qr-detail-view/' . $item->qr_code_id),
                    'qr_code_installation_option' => $request->qr_display_option,
                    'additional_note' => $note,
                    'address_line_1' => $shiping_address->address_line1,
                    'address_line_2' => $shiping_address->address_line2,
                    'country' => get_country_name($shiping_address->country),
                    'state' => get_state_name($shiping_address->state),
                    'city' => get_city_name($shiping_address->city),
                    'postal_code' => $shiping_address->postal_code,
                    //Additional Fields
                    'name_on_order' => $meta_data['name_on_order'] ? $meta_data['name_on_order'] : '',
                    'company_name' => $meta_data['company_name'] ? $meta_data['company_name'] : '',
                    'inscription_type' => $meta_data['inscription_type'] ? $meta_data['inscription_type'] : '',
                    'cemetry_location_name' => $meta_data['cemetry_location_name'] ? $meta_data['cemetry_location_name'] : '',
                    'cemetry_location_address' => $meta_data['cemetry_location_address'] ? $meta_data['cemetry_location_address'] : '',
                    'cemetry_location_phone' => $meta_data['cemetry_location_phone'] ? $meta_data['cemetry_location_phone'] : '',
                    'inscription2_endearment' => $meta_data['inscription2_endearment'] ? $meta_data['inscription2_endearment'] : '',
                    'customendearment2' => $meta_data['customendearment2'] ? $meta_data['customendearment2'] : '',
                    'inscription2_firstname' => $meta_data['inscription2_firstname'] ? $meta_data['inscription2_firstname'] : '',
                    'inscription2_middlename' => $meta_data['inscription2_middlename'] ? $meta_data['inscription2_middlename'] : '',
                    'inscription2_lastname' => $meta_data['inscription2_lastname'] ? $meta_data['inscription2_lastname'] : '',
                    'inscription2_dob' => $meta_data['inscription2_dob'] ? $meta_data['inscription2_dob'] : '',
                    'inscription2_dd' => $meta_data['inscription2_dd'] ? $meta_data['inscription2_dd'] : '',
                    'inscription2_epitaph' => $meta_data['inscription2_epitaph'] ? $meta_data['inscription2_epitaph'] : '',
                    'inscription2_emblem' => $meta_data['inscription2_emblem'] ? $meta_data['inscription2_emblem'] : '',
                    'design_number' => $meta_data['design_number'] ? $meta_data['design_number'] : '',
                    'sanded_panel' => $meta_data['sanded_panel'] ? $meta_data['sanded_panel'] : '',
                    'sanded_artwork' => $meta_data['sanded_artwork'] ? $meta_data['sanded_artwork'] : '',
                    'shape' => $meta_data['shape'] ? $meta_data['shape'] : '',
                    'size' => $meta_data['size'] ? $meta_data['size'] : '',
                    'customshapesize' => $meta_data['customshapesize'] ? $meta_data['customshapesize'] : '',
                    'color' => $meta_data['color'] ? $meta_data['color'] : '',
                    'polish' => $meta_data['polish'] ? $meta_data['polish'] : '',
                    'polishnote' => $meta_data['polishnote'] ? $meta_data['polishnote'] : '',
                    'engraving_depth' => $meta_data['engraving_depth'] ? $meta_data['engraving_depth'] : '',
                    'base_size' => $meta_data['base_size'] ? $meta_data['base_size'] : '',
                    'base_size_continued' => $meta_data['base_size_continued'] ? $meta_data['base_size_continued'] : '',
                    'photo_shape' => $meta_data['photo_shape'] ? $meta_data['photo_shape'] : '',
                    'photo_size' => $meta_data['photo_size'] ? $meta_data['photo_size'] : '',
                    'photo_color' => $meta_data['photo_color'] ? $meta_data['photo_color'] : '',
                    'photo_cropping' => $meta_data['photo_cropping'] ? $meta_data['photo_cropping'] : '',
                    'photo_background' => $meta_data['photo_background'] ? $meta_data['photo_background'] : '',
                    'basecolor' => $meta_data['basecolor'] ? $meta_data['basecolor'] : '',
                    'basecolor_additional_note' => $meta_data['basecolor_additional_note'] ? $meta_data['basecolor_additional_note'] : '',

                    // Inscription 1 Data
                    'endearment' => $meta_data1['endearment'] ? $meta_data1['endearment'] : '',
                    'customendearment' => $meta_data1['customendearment'] ? $meta_data1['customendearment'] : '',
                    'fname' => $meta_data1['fname'] ? $meta_data1['fname'] : '',
                    'lname' => $meta_data1['lname'] ? $meta_data1['lname'] : '',
                    'dob' => $meta_data1['dob'] ? $meta_data1['dob'] : '',
                    'dod' => $meta_data1['dod'] ? $meta_data1['dod'] : '',
                    'epitaph' => $meta_data1['epitaph'] ? $meta_data1['epitaph'] : '',
                    'ownepitaph' => $meta_data1['ownepitaph'] ? $meta_data1['ownepitaph'] : '',
                ];

                $email = new OrderDetails($email_data);
                Mail::to('manpreetdev.cts@gmail.com')->send($email);
                // session()->forget('metadara');
                // session()->forget('metadara1');
            }
        } else {
            $order = DB::table('orders')->where('id', $request->order_id)->first();
            $data = [
                'user_id' => Auth::user()->id,
                'shipping_address_id' => $id,
                'product_id' => $order->product_id,
                'product_image' => $order->product_image,
                'amount' => $order->amount,
                'shipping_charge' => $shiping_charge,
                'quantity' => 1,
                'currency' => 'usd',
                'payment_method' => 'CARD',
                'payment_status' => 'Paid',
                'order_date' => Carbon::now(),
            ];
            DB::table('orders')->insert($data);
        }



        // $email_data = [
        //     'product_image' => '',
        //     'product_name' => '',
        //     'quantity' => '',
        //     'amount' => '',
        //     'order_date' => '',
        //     'user_image' => '',
        //     'user_name' => '',
        //     'user_email' => '',
        //     'mobile_no' => '',
        //     'qr_code_image' => '',
        //     'qr_code_installation_option' => '',
        //     'qr_code_detail_link' => '',
        //     'additional_note' => '',
        //     'address_line_1' => '',
        //     'address_line_2' => '',
        //     'country' => '',
        //     'state' => '',
        //     'city' => '',
        // ];

        // $email = new OrderDetails($email_data);
        // Mail::to('saurabh.cts@gmail.com')->send($email);
        return redirect('dashboard');
    }
}
