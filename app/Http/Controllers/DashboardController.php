<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qr;
use App\Models\QrImage;
use App\Models\QrVideo;
use App\Models\User;
use App\Models\UserPlan;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DashboardController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $qr_details = $user->qrcodeDetails;
        foreach ($qr_details as $key => $value) {
            $url = url('qr-detail-view') . '/' . $value->id;
            // Generate the QR code
            $qrCode = QrCode::size(120)->generate($url);
            $value->qrcode = $qrCode;
        }
        $shippig_addresses = ShippingAddress::where('user_id', $user_id)->orderBy('is_default', 'DESC')->get();
        $countries = DB::table('countries')->get();
        $orders = DB::table('orders')
        ->where('orders.user_id',$user_id)
        ->join('products','orders.product_id','=','products.id')
        ->join('shipping_addresses','orders.shipping_address_id','=','shipping_addresses.id')
        ->select('products.name','orders.*','shipping_addresses.*','orders.id as order_id')
        ->get();
        return view('dashboard.index', compact('user', 'qr_details', 'shippig_addresses', 'countries','orders'));
    }

    public function getStates(Request $request)
    {
        $country_id = $request->country_id;
        $states = DB::table('states')->select('id', 'name')->where('country_id', $country_id)->get();

        // $country_id =  DB::table('countries')->select("id")->where("name", $country_name)->first();
        // // dd($country_id);
        // if (isset($country_id->id)) {
        //     $states = DB::table('states')->where('country_id', $country_id->id)->get();
        // }

       return response()->json($states);
    }

    public function getCities(Request $request)
    {
        $country_id = $request->country_id;
        $state_id = $request->state_id;

        $cities = DB::table('cities')->select('id', 'name')->where('country_id', $country_id)->where('state_id', $state_id)->get();
        // $state_id =  DB::table('states')->select("id")->where("name", $state_name)->first();
        // if (isset($state_id->id)) {
        //     $cities = DB::table('cities')->where('state_id', $state_id->id)->get();
        // }
       return response()->json($cities);
    }
}
