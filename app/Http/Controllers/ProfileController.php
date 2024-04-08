<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\ShippingAddress;
use Validator;
Use DB;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Update the user with the validated data
        $user = User::findOrFail($request->user_id);
        $user->name = $request->name;
        $user->mobile_number = $request->mobile_number;
        $user->description = $request->description;
        if ($request->hasFile('profile_pic')) {
            $image = $request->file('profile_pic');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/profile_image');
            $image->move($destinationPath, $name);
            $user->profile_pic = $name;
        }
        $user->save();

        return Redirect::route('dashboard')->with('success', 'Profile Updated!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function saveShippingAddress(Request $request){
        // echo"<pre>"; print_r($request->all());  die;

        $validator = Validator::make($request->all(), [
            'recipient_name' => 'required|string',
            'ship_address' => 'required',
            // 'ship_city' => 'required|string',
            // 'ship_state' => 'required|string',
            'postal_code' => 'required',
            // 'ship_country' => 'required|string',
        ],[   
            'recipient_name.required'    => 'Customer Name is required.',
            'recipient_name.string'    => 'Please enter valid customer name.',
            'ship_address.required'    => 'Customer Address is required.',
            // 'ship_city.required'      => 'Customer Cite is required.',
            // 'ship_city.string'      => 'Please enter valid city.',
            // 'ship_state.required'      => 'Customer State is required.',
            // 'ship_state.string'      => 'Please enter valid state.',
            'postal_code.required'      => 'Customer Postal Code is required.',
            // 'ship_country.required'      => 'Customer Country Code is required.',
            // 'ship_country.string'      => 'Please select valid country.',
        ]);

        if ($validator->fails()) { 
            $errors = $validator->messages();
            foreach ($errors->all() as $error) {
                return Redirect::route('dashboard')->with('error', $error); 
            }           
        }

        $user_id = Auth::id();
        if($request->is_default == 1){
            // Old default address remove
            DB::table('shipping_addresses')->where('user_id', $user_id)->update(array('is_default' => '0'));
        }

        //Store Shipping address
        $shipping_address = new ShippingAddress([
            'user_id' => $user_id,
            'recipient_name' => $request->recipient_name,
            'address_line1' => $request->ship_address,
            'address_line2' => $request->ship_additioanl_address,
            'land_mark' => $request->ship_land_mark,
            'city' => $request->ship_city,
            'state' => $request->ship_state,
            'postal_code' => $request->postal_code,
            'country' => $request->ship_country,
            'is_default' => $request->is_default ? $request->is_default : '0',
        ]);
        $shipping_address->save();
        return Redirect::route('dashboard')->with('success', 'Shipping address successfully saved.');
    }

    public function updateShippingAddress(Request $request){
        // echo"<pre>"; print_r($request->all()); die('Please wait..!');
        $shipping_add = ShippingAddress::find($request->id);
        $shipping_add->address_line1 = $request->update_address1;
        $shipping_add->address_line2 = $request->update_address2;
        $shipping_add->city = $request->update_city;
        $shipping_add->state = $request->update_state;
        $shipping_add->country = $request->update_country;
        $shipping_add->postal_code = $request->update_postal_code;
        $shipping_add->save();
        return response()->json([ 'type' => 'success', 'message' => 'Shipping address updated successfully', 'data' => $shipping_add], 200);
    }

    public function removeShippingAddress(Request $request){
        $address = ShippingAddress::find($request->id);
        $address->delete();
        return response()->json([ 'type' => 'success', 'message' => 'Shipping address deleted successfully' ], 200);
    }

    public function saveDataIntoSession(Request $request){
        session()->put('metadara1', json_encode($request->data));
        // echo"<pre>"; print_r(json_encode($request->data)); die;
    }
}
