@include('layouts.header')
<section class="dashboard">
    <div class="container">
        <div class="dashboard-inner">
            <div class="hs-store-heading">
                <h1 class="common-heading">
                    Dashboard
                </h1>
                <hr class="gray-line" />
            </div>

            <div class="dashboard-tabs-main">
                <div class="dashboard-tabs-left">
                    <div class="nav nav-pills nav-pills-custom dashboard-menu" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <!-- active -->
                        <a class="dashboard-menu-item " id="dashboard-address-tab" data-toggle="pill" href="#dashboard-address" role="tab" aria-controls="dashboard-address" aria-selected="true">
                            <span class="font-weight-bold small text-uppercase"></span>Address</span>
                        </a>

                        <a class="dashboard-menu-item" id="dashboard-profile-tab" data-toggle="pill" href="#dashboard-profile" role="tab" aria-controls="dashboard-profile" aria-selected="false">
                            <span class="font-weight-bold small text-uppercase">Edit Profile</span>
                        </a>

                        <a class="dashboard-menu-item" id="dashboard-orders-tab" data-toggle="pill" href="#dashboard-orders" role="tab" aria-controls="dashboard-orders" aria-selected="false">
                            <span class="font-weight-bold small text-uppercase">Orders</span>
                        </a>

                        <a class="dashboard-menu-item" id="dashboard-qrcodes-tab" data-toggle="pill" href="#dashboard-qrcodes" role="tab" aria-controls="dashboard-qrcodes" aria-selected="false">
                            <span class="font-weight-bold small text-uppercase">QR Codes</span>
                        </a>
                    </div>
                </div>

                <div class="dashboard-tabs-right">
                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        <script>
                            // let profileTab = localStorage.getItem("openTab");
                            // if(profileTab == 'dashboard-profile-tab') {                              
                            //     $('#'+profileTab).click();
                            // }
                        </script>

                        @endif

                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <!-- Your form here -->
                    </div>

                    <div class="tab-content" id="v-pills-tabContent">
                        <!-- show active -->
                        <div class="tab-pane fade " id="dashboard-address" role="tabpanel" aria-labelledby="dashboard-address-tab">
                            <div class="dashboard-address-inner">
                                <div id="success_remove_shipping" style="color: green; text-align: center;"></div>
                                <div class="dashboard-address-btn-grp">
                                    <!-- <a href="#dashboard-form" class="add-new-address">
                                        Add New Address

                                    </a> -->
                                    <button type="button" class="add-new-address dashboard-address-edit-btn" data-bs-toggle="modal" data-bs-target="#addaddressModal">Add New Address</button>
                                </div>
                                @if(count($shippig_addresses)>0)
                                <div class="dashboard-address-grid">
                                    @foreach($shippig_addresses as $key => $shipping_address)
                                    <div class="dashboard-address-inner-item">
                                        <div class="dashboard-address-main-content">
                                            @if($key == 0)
                                            <p class="dashboard-address-default-tag">
                                                <i class="fa-solid fa-house-circle-check"></i>Default
                                            </p>
                                            @endif
                                            <p class="dashboard-user-name">
                                                {{ $shipping_address->recipient_name }}
                                            </p>
                                            <div class="dashboard-user-address">
                                                <p class="dashboard-user-addres-p">
                                                    {{ $shipping_address->address_line1 }} <br>
                                                    {{get_city_name($shipping_address->city)}}, {{get_state_name($shipping_address->state)}}, {{ $shipping_address->postal_code }} <br>
                                                    {{get_country_name($shipping_address->country)}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="dashboard-address-inner-item-btn-grp">


                                            <button type="button" onclick="showUpdateModal('{{$shipping_address}}')" class="dashboard-address-edit-btn"> Edit </button>

                                            <!-- <button type="button" class="dashboard-address-edit-btn" data-bs-toggle="modal" data-bs-target="#addressModal">Edit</button> -->
                                            <button class="dashboard-address-remove-btn" onclick="removeShipping('{{$shipping_address->id}}')">Remove</button>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <div class="no-address">
                                    <p>
                                        <span><i class="fa-solid fa-building-user"></i></span>
                                        No address yet.
                                    </p>
                                </div>
                                @endif



                                <!-- Update Shipping address Modal -->
                                <div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content address-modal">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="addressModalLabel">Change Shipping Address</h1>
                                            </div>
                                            <div id="error_shipping" style="color: red; text-align: center;"></div>
                                            <div id="success_shipping" style="color: green; text-align: center;"></div>
                                            <div class="modal-body">
                                                <form class="row" id="update_shipping">
                                                    @csrf

                                                    <div class="checkout-form-div">
                                                        <div class="checkout-form-div-inner">
                                                            <label for="">Name</label>
                                                            <input type="text" name="update_recipient_name" id="update_recipient_name" class="checkout-input" placeholder="Enter your name">
                                                        </div>
                                                    </div>
                                                    <div class="checkout-form-div">
                                                        <div class="checkout-form-div-inner">
                                                            <label for="">Address Line 1 *</label>
                                                            <textarea class="checkout-input " name="update_address1" id="update_address1" placeholder="House number and street name" cols="30" rows="5"></textarea>
                                                            <!-- <input type="text" name="update_address1" id="update_address1" class="checkout-input" placeholder="House number and street name"> -->
                                                        </div>
                                                        <div class="checkout-form-div-inner">
                                                            <label for="">Address Line 2</label>
                                                            <textarea class="checkout-input " name="update_address2" id="update_address2" placeholder="enter additional address" cols="30" rows="5"></textarea>
                                                            <!-- <input type="text" name="update_address2" id="update_address2" class="checkout-input" placeholder="enter additional address"> -->
                                                        </div>
                                                    </div>



                                                    <div class="checkout-form-div">
                                                        <div class="checkout-form-div-inner">
                                                            <label for="">Land Mark</label>
                                                            <input type="text" name="ship_land_mark" id="ship_land_mark" class="checkout-input" placeholder="Land Mark">
                                                        </div>
                                                    </div>

                                                    <div class="checkout-form-div">
                                                        <div class="checkout-form-div-inner">
                                                            <label for="">Country *</label>
                                                            <select name="update_country" id="update_country" class="checkout-input" onChange="getStates(this.value)">
                                                                <!-- <option value="United State">United State</option> -->
                                                                @foreach($countries as $country)
                                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="checkout-form-div-inner">
                                                            <label for="">State *</label>
                                                            <select name="update_state" id="update_state" class="checkout-input" onChange="getCities(this.value, $('#update_country').val())">
                                                                <!-- <option value="Alabama">Alabama</option>
                                                                <option value="Alaska">Alaska</option>
                                                                <option value="Arizona">Arizona</option>
                                                                <option value="Arkansas">Arkansas</option>
                                                                <option value="California">California</option> -->
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- <div class="checkout-form-div">
                                                        
                                                    </div> -->

                                                    <div class="checkout-form-div">
                                                        <div class="checkout-form-div-inner">
                                                            <label for="">City *</label>
                                                            <select name="update_city" id="update_city" class="checkout-input"></select>
                                                        </div>
                                                        <div class="checkout-form-div-inner">
                                                            <label for="">Postcode *</label>
                                                            <input type="text" id="update_postal_code" name="update_postal_code" class="checkout-input" placeholder="">
                                                        </div>
                                                    </div>

                                                    <!-- <div class="checkout-form-div">
                                                        
                                                    </div> -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                                                        <button class="btn btn-primary save-changes-btn">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Update Shipping address Modal -->

                                <!-- Add Shipping address Modal -->
                                <div class="modal fade" id="addaddressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content address-modal">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="addressModalLabel">
                                                    <label class="form-check-label head-label" for="gridCheck">
                                                        Shipping Address
                                                    </label>
                                                </h1>
                                            </div>

                                            <div class="modal-body">
                                                <div id="dashboard-form" class="dashboard-form">
                                                    <form method="POST" action="{{ route('shipping.address') }}" class="dashboard-form-grid" id="add-address">
                                                        @csrf
                                                        <div class="shipping-part">
                                                            <!-- <div class="col-12">
                                                                <label class="form-check-label head-label" for="gridCheck">
                                                                    Shipping Address
                                                                </label>
                                                            </div> -->

                                                            <!-- <div class="checkout-form-div">
                                                                <div class="checkout-form-div-inner">
                                                                    <label for="">Cemetery / Company / Contact Name
                                                                        (optional)</label>
                                                                    <input type="text" class="checkout-input" placeholder="">
                                                                </div>
                                                            </div>

                                                            <div class="checkout-form-div">
                                                                <div class="checkout-form-div-inner">
                                                                    <label for="">Company name (optional)</label>
                                                                    <input type="text" class="checkout-input" placeholder="">
                                                                </div>
                                                            </div> -->

                                                            <div class="checkout-form-div">
                                                                <div class="checkout-form-div-inner">
                                                                    <label for="">Name</label>
                                                                    <input type="text" name="recipient_name" id="recipient_name" class="checkout-input" placeholder="Enter your name">
                                                                </div>
                                                                <!-- <div class="checkout-form-div-inner">
                                                                    <label for="">Company name (optional)</label>
                                                                    <input type="text" name="ship_company_name" id="ship_company_name" class="checkout-input" placeholder="Enter Company name">
                                                                </div> -->
                                                            </div>

                                                            <div class="checkout-form-div ">
                                                                <div class="checkout-form-div-inner">
                                                                    <label for="">Address Line 1</label>
                                                                    <textarea class="checkout-input " name="ship_address" id="ship_address" placeholder="House number and street name" cols="30" rows="5"></textarea>
                                                                    <!-- <input type="text" name="ship_address" id="ship_address" class="checkout-input mb-3" placeholder="House number and street name"> -->
                                                                </div>
                                                                <div class="checkout-form-div-inner">
                                                                    <label for="">Address Line 2</label>
                                                                    <textarea class="checkout-input" name="ship_additioanl_address" id="ship_additioanl_address" placeholder="Enter Additional Address" cols="30" rows="5"></textarea>
                                                                    <!-- <textarea name="ship_additioanl_address" id="ship_additioanl_address" class="checkout-input mb-3" cols="30" rows="5" placeholder="Enter Additional Address"> -->
                                                                    </textarea>
                                                                </div>
                                                            </div>

                                                            <!-- <div class="checkout-form-div ">
                                                                <div class="checkout-form-div-inner">
                                                                    <label for="">Address Line 2</label>
                                                                    <input type="text" name="ship_additioanl_address" id="ship_additioanl_address" class="checkout-input mb-3" placeholder="Enter Additional Address">
                                                                </div>
                                                            </div> -->

                                                            <div class="checkout-form-div">
                                                                <div class="checkout-form-div-inner">
                                                                    <label for="">Land Mark</label>
                                                                    <input type="text" name="ship_land_mark" id="ship_land_mark" class="checkout-input" placeholder="Land Mark">
                                                                </div>
                                                            </div>

                                                            <div class="checkout-form-div">
                                                                <div class="checkout-form-div-inner">
                                                                    <label for="">Country *</label>
                                                                    <select name="ship_country" id="ship_country" class="checkout-input" onChange="getStates(this.value)">

                                                                        @foreach($countries as $country)
                                                                        <option value="{{ $country->id }}" <?= $country->name == 'United States' ? 'selected' : '' ?>>{{ $country->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="checkout-form-div-inner">
                                                                    <label for="">State *</label>
                                                                    <select name="ship_state" id="ship_state" class="checkout-input" onChange="getCities(this.value,$('#ship_country').val())">
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <!-- <div class="checkout-form-div">
                                                            <div class="checkout-form-div-inner">
                                                                    <label for="">City *</label>
                                                                    
                                                                    <select name="ship_city" id="ship_city" class="checkout-input">
                                                                    </select>
                                                                </div>
                                                            </div> -->

                                                            <div class="checkout-form-div checkout-form-div-grid">
                                                                <div class="checkout-form-div-inner">
                                                                    <label for="">City *</label>
                                                                    <!-- <input type="text" name="ship_city" id="ship_city" class="checkout-input" placeholder=""> -->
                                                                    <select name="ship_city" id="ship_city" class="checkout-input">
                                                                    </select>
                                                                </div>
                                                                <div class="checkout-form-div-inner">
                                                                    <label for="">Postcode / ZIP *</label>
                                                                    <input type="text" name="postal_code" id="postal_code" class="checkout-input" placeholder="">
                                                                </div>
                                                            </div>

                                                            <div class="checkout-form-div default_address">
                                                                <div class="checkout-form-div-inner">
                                                                    <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input" name="is_default" id="is_default" value="1">
                                                                        <label class="form-check-label default_text" for="is_default">Make this my default address</label>
                                                                    </div>
                                                                    <!-- <div class="checbox-flex" style="display:flex">
                                                                        <input type="checkbox" name="is_default" id="is_default" value="1" class="" style="width: 100%;">
                                                                        <label class="default_text">Make this my default address</label>
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                                                            <!-- <button class="btn btn-primary dashboard-save-btn">Save Changes</button> -->
                                                            <button class="btn btn-primary save-changes-btn">Save Changes</button>
                                                        </div>
                                                        <!-- <button class="btn btn-primary dashboard-save-btn">Save Changes</button> -->

                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Add Update Shipping address Modal -->


                            </div>
                        </div>

                        <div class="tab-pane fade" id="dashboard-profile" role="tabpanel" aria-labelledby="dashboard-profile-tab">
                            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                <div class="profile-img-grid mb-3 mt-3">
                                    <div class="profile-img-div">
                                        <?php
                                        if (auth()->user()->profile_pic) {
                                            $image = './profile_image/' . auth()->user()->profile_pic;
                                        } else {
                                            $image = './assets/images/default-image.png';
                                        }
                                        ?>
                                        <img class="profile-img" id="frame" src="{{$image}}" alt="">

                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="formFile" class="form-label">Upload Photo</label>
                                    <input class="form-control user-detail-input" accept="image/*" type="file" id="formFile" name="profile_pic" onchange="loadImg()">
                                </div>

                                <div class="checkout-form-div">
                                    <div class="checkout-form-div-inner">
                                        <label for="">Name</label>
                                        <input id="name" type="text" class="checkout-input form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', auth()->user()->name) }}" required autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="checkout-form-div-inner">
                                        <label for="">Email address *</label>
                                        <input type="email" class="checkout-input" placeholder="{{ Auth::user()->email }}" disabled>
                                    </div>
                                </div>

                                <div class="checkout-form-div">
                                    <div class="checkout-form-div-inner">
                                        <label for="">Phone *</label>
                                        <input id="mobile_number" type="tel" class="checkout-input form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{ old('mobile_number', auth()->user()->mobile_number) }}" required autofocus>
                                        @error('mobile_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="checkout-form-div">
                                    <div class="checkout-form-div-inner">
                                        <label for="">Bio (Optional)</label>
                                        <textarea class="form-control user-detail-input" id="descriptions" name="description" placeholder="Description..." rows="5" cols="33">{{ auth()->user()->description }}</textarea>
                                    </div>
                                </div>

                                <button type="submit" style="display:none" id="profile-update-btn" class="btn btn-primary dashboard-save-btn">{{ __('Update Profile') }}</button>
                                <button type="button" class="btn btn-primary dashboard-save-btn OnSave">{{ __('Update Profile') }}</button>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="dashboard-orders" role="tabpanel" aria-labelledby="dashboard-orders-tab">
                            <div class="dashboard-orders-inner">
                                @foreach($orders as $order)
                                <div class="dashboard-qrcodes-inner-item">
                                    <div class="dashboard-qrcodes-inner-item-top">
                                        <p class="dashhboard-order-dd">
                                            Order on : {{ date('d M Y', strtotime($order->order_date)) }}
                                        </p>
                                        <p class="dashhboard-order-dd">
                                            Order Id : #{{$order->order_id}}
                                        </p>
                                    </div>


                                    <hr />
                                    <div class="dashbaord-qrcodes-item-btm">
                                        <div class="dashboard-qrcodes-item-btm-left">
                                            <div class="dashboard-qr-img">
                                                <img src="{{ asset($order->product_image) }}" alt="">
                                            </div>
                                        </div>
                                        <div class="dashboard-qrcodes-item-btm-right">
                                            <div class="dashboard-form-div">
                                                <div class="dashboard-form-div-inner">
                                                    <p class="qr-dop-p">
                                                        <span class="order-label">{{$order->name}}</span>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="dashboard-form-div">
                                                <div class="dashboard-form-div-inner">
                                                    <label class="order-label" for="">Address:</label>
                                                    <p>
                                                        {{get_country_name($order->country)}}, {{get_state_name($order->state)}}<br>
                                                        {{get_city_name($order->city)}}, {{ $order->postal_code }} <br>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="dashboard-form-div">
                                                <div class="dashboard-form-div-inner">
                                                    <p class="qr-dop-p">
                                                        <span class="order-label">Total :</span>
                                                        <span>${{$order->amount * (int)$order->quantity}}</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="dashboard-form-div">
                                                <div class="dashboard-form-div-inner">
                                                    <p class="qr-dop-p">
                                                        <span class="order-label">Payment Status :</span>
                                                        <span>{{$order->payment_status}}</span>
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="dashboard-orders-btn-grid">
                                        <form action="{{ url('/payment') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="order_id" value="{{ $order->order_id }}">
                                            <button type="submit" class="dashboard-orders-repeat">Buy again</button>
                                        </form>
                                        <a href="{{ url('order-detail/'.$order->order_id) }}" class="dashboard-orders-details">View details</a>
                                    </div>
                                </div>
                                @endforeach
                                <!-- <div class="dashboard-qrcodes-inner-item">
                                    <div class="dashboard-qrcodes-inner-item-top">
                                        <p class="dashhboard-order-dd">
                                            Delivered on : 25 July 2023
                                        </p>
                                        <p class="dashhboard-order-dd">
                                            Order Id : #1234
                                        </p>
                                    </div>


                                    <hr />
                                    <div class="dashbaord-qrcodes-item-btm">
                                        <div class="dashboard-qrcodes-item-btm-left">
                                            <div class="dashboard-qr-img">
                                                <img src="./assets/images/angel-hs-1.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="dashboard-qrcodes-item-btm-right">
                                            <div class="dashboard-form-div">
                                                <div class="dashboard-form-div-inner">
                                                    <p class="qr-dop-p">
                                                        <span class="order-label">Angel Flat Headstone</span>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="dashboard-form-div">
                                                <div class="dashboard-form-div-inner">
                                                    <label class="order-label" for="">Description</label>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                        Praesent dignissim tempus lacus eget
                                                        viverra. Nunc sit amet
                                                        gravida est.
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="dashboard-form-div">
                                                <div class="dashboard-form-div-inner">
                                                    <p class="qr-dop-p">
                                                        <span class="order-label">Total :</span>
                                                        <span>$1000</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="dashboard-form-div">
                                                <div class="dashboard-form-div-inner">
                                                    <p class="qr-dop-p">
                                                        <span class="order-label">Payment Status :</span>
                                                        <span>Paid</span>
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="dashboard-orders-btn-grid">
                                        <a href="" class="dashboard-orders-repeat">Buy again</a>
                                        <a href="{{ route('order.detail') }}" class="dashboard-orders-details">View details</a>
                                    </div>
                                </div> -->

                                <!-- <div class="dashboard-order-details" style="display:none;">
                                    <div class="dashboard-orderdetails-content">
                                        <div class="dashboard-order-details-content-grid">
                                            <div class="dashboard-order-details-content-left">
                                                <img src="./assets/images/angel-hs-1.jpg" alt="">
                                            </div>
                                            <div class="dashboard-order-details-content-right">
                                                <p class="dashboard-product-name">
                                                    Flat Headstone
                                                </p>
                                                <p>
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex similique praesentium cumque. Expedita doloremque temporibus velit voluptas? Incidunt sunt esse amet, ab voluptates cum quod praesentium, provident consequuntur impedit in.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dashboard-order-details-rate">
                                        <div class="dashboard-order-details-rate-grid">
                                            <p>
                                                Order Id
                                            </p>
                                            <p class="dots">

                                            </p>
                                            <p>
                                                #1234
                                            </p>
                                        </div>
                                        <div class="dashboard-order-details-rate-grid">
                                            <p>
                                                Order Date
                                            </p>
                                            <p class="dots">

                                            </p>
                                            <p>
                                                10 July 2023
                                            </p>
                                        </div>
                                        <div class="dashboard-order-details-rate-grid">
                                            <p>
                                                Delivery Date
                                            </p>
                                            <p class="dots">

                                            </p>
                                            <p>
                                                30 July 2023
                                            </p>
                                        </div>
                                        <div class="dashboard-order-details-rate-grid">
                                            <p>
                                                Payment Status
                                            </p>
                                            <p class="dots">

                                            </p>
                                            <p>
                                                Paid
                                            </p>
                                        </div>
                                        <div class="dashboard-order-details-rate-grid">
                                            <p>
                                                Quantity
                                            </p>
                                            <p class="dots">

                                            </p>
                                            <p>
                                                1
                                            </p>
                                        </div>
                                        <div class="dashboard-order-details-rate-grid">
                                            <p>
                                                Shipping Charges
                                            </p>
                                            <p class="dots">

                                            </p>
                                            <p>
                                                $100
                                            </p>
                                        </div>
                                        <div class="dashboard-order-details-rate-grid">
                                            <p>
                                                Discount
                                            </p>
                                            <p class="dots">

                                            </p>
                                            <p>
                                                $100
                                            </p>
                                        </div>
                                        <div class="dashboard-order-details-rate-grid">
                                            <p>
                                                Total
                                            </p>
                                            <p class="dots">

                                            </p>
                                            <p>
                                                $1000
                                            </p>
                                        </div>
                                    </div>
                                    <div class="dashboard-order-details-address">
                                        <p class="dashboard-order-details-address-heading">
                                            Shipping Address
                                        </p>
                                        <div class="dashboard-user-address">
                                            <p class="dashboard-user-addres-p">
                                                123 Park Center Dr. <br>
                                                Vista, CA 12345 <br>
                                                (123) 123-1234 retail <br>
                                                (123) 123-1234 wholesale <br>
                                            </p>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <div class="tab-pane fade" id="dashboard-qrcodes" role="tabpanel" aria-labelledby="dashboard-qrcodes-tab">
                            <div class="dashboard-qrcodes-inner">
                                <div class="dashboard-qrcodes-inner-item">
                                    <p class="qrcodes-names">
                                        {{ Auth::user()->name }}
                                    </p>
                                    <hr />
                                    @if(count($qr_details)>0)
                                    @foreach($qr_details as $detail)
                                    <div class="dashbaord-qrcodes-item-btm">

                                        <div class="dashboard-qrcodes-item-btm-left">
                                            <div class="dashboard-qr-img">
                                                <span class="qrcode">
                                                    {{ $detail->qrcode }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="dashboard-qrcodes-item-btm-right">
                                            <div class="dashboard-form-div">
                                                <div class="dashboard-form-div-inner">
                                                    <p class="qr-dop-p">
                                                        <span class="order-label">Date of Purchase :</span>
                                                        <span>{{ $detail->created_at->format('Y-m-d')  }}</span>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="dashboard-form-div">
                                                <div class="dashboard-form-div-inner">
                                                    <label class="order-label" for="">Description</label>
                                                    <p class="dashboard-form-div-inner-p">
                                                        {{ $detail->biography }}
                                                    </p>
                                                </div>
                                                <a href="{{ url('qr-detail-view') }}/{{$detail->id}}" class="view-btn">View More Details</a>
                                            </div>
                                        </div>

                                    </div>
                                    <hr />
                                    @endforeach
                                    @else
                                    <div class="no-address">
                                        <p>
                                            <span><i class="fa-solid fa-qrcode"></i></span>
                                            No QR Purchased.
                                        </p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="loader" style="display:none;">
    <div class="loader-inner">
        <div class="loader-inner-div">
            <img src="./assets/images/loader-img.gif" alt="">
            <p class="loader-text">
                Please wait...
            </p>
        </div>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="{{asset('/assets/js/dashboard-menu.js')}}"></script>

<script>
    if ("{{ session('success') }}") {
        setTimeout(function() {
            $(".alert-success").fadeOut(1000)
        }, 5000);
    }

    // $('#ship_country')
    function getStates(country_id) {
        $('#ship_city').html('');
        $('#ship_state').html('');
        $('#update_state').html('');
        $('#update_city').html('');
        $.ajax({
            url: "{{ url('/get-states') }}",
            type: 'POST',
            data: {
                country_id: country_id
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {

                if (response.length > 0) {
                    const StateList = response.sort((a, b) =>
                        a.name.localeCompare(b.name));
                    StateList.forEach((value, index) => {
                        $('#ship_state').append(`<option value="` + value.id + `">` + value.name + `</option>`);
                        $('#update_state').append(`<option value="` + value.id + `">` + value.name + `</option>`);
                    });

                    // Use For edit section
                    setTimeout(() => {
                        var editObj = localStorage.getItem('shiiping_edit');
                        editObj = $.parseJSON(editObj);
                        if (editObj !== null) {
                            $('#update_state').val(editObj.state);
                            $('#update_state').trigger('change');
                        }
                    }, 50);


                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                alert(xhr.responseText)
            }
        });
    }

    function getCities(state_id, country_id) {

        $('#ship_city').html('');
        $('#update_city').html('');
        $.ajax({
            url: "{{ url('/get-cities') }}",
            type: 'POST',
            data: {
                country_id: country_id,
                state_id: state_id
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.length > 0) {
                    const CityList = response.sort((a, b) =>
                        a.name.localeCompare(b.name));

                    CityList.forEach((value, index) => {
                        $('#ship_city').append(`<option value="` + value.id + `">` + value.name + `</option>`);
                        $('#update_city').append(`<option value="` + value.id + `">` + value.name + `</option>`);
                    });

                    // Use For edit section
                    setTimeout(() => {
                        var editObj = localStorage.getItem('shiiping_edit');
                        editObj = $.parseJSON(editObj);
                        if (editObj !== null) {
                            $("#update_city").val(editObj.city);
                        }
                    }, 50);
                }
            },
            error: function(xhr, status, error) {
                $('.loader').css('display', 'none');
                // Handle the error response
                console.log(xhr.responseText);
                alert(xhr.responseText)
            }
        });
    }

    $('#v-pills-tab a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });


    $('.OnSave').click(function(e) {
        e.preventDefault();
        localStorage.setItem("openTab", 'dashboard-profile-tab');
        $('#profile-update-btn').click();
    });

    $('input[name="mobile_number"]').keyup(function(e) {
        if (/\D/g.test(this.value)) {
            // Filter non-digits from input value.
            this.value = this.value.replace(/\D/g, '');
        }
    });

    $(document).ready(function() {

        let profileTab = localStorage.getItem("openTab");
        if (profileTab == 'dashboard-profile-tab') {
            $('#' + profileTab).click();
            localStorage.removeItem("openTab");
        } else {
            setTimeout(() => {
                $('#dashboard-address-tab').click();
                localStorage.removeItem("openTab");
            }, 50);

        }

        $('#mobile_number').on('input', function() {
            let phoneNumber = $(this).val().replace(/\D/g, ''); // Remove non-digits
            phoneNumber = phoneNumber.substring(0, 10); // Limit to 10 characters
            const formattedPhoneNumber = formatPhoneNumber(phoneNumber); // Format the phone number
            $(this).val(formattedPhoneNumber); // Set the formatted value back to the input field
        });
    });

    function loadImg() {
        $('#frame').attr('src', URL.createObjectURL(event.target.files[0]));
    }

    var shipping;

    function showUpdateModal(shipping) {
        //Open Modal
        $('#addressModal').modal('show');
        var jsonObj = $.parseJSON(shipping);

        localStorage.setItem('shipping_id', jsonObj.id);

        localStorage.setItem('shiiping_edit', JSON.stringify({
            'state': jsonObj.state,
            'city': jsonObj.city
        }));

        $("#update_recipient_name").val(jsonObj.recipient_name);
        $("#update_address1").val(jsonObj.address_line1);
        $("#update_address2").val(jsonObj.address_line2);
        $("#ship_land_mark").val(jsonObj.land_mark);
        $('#update_country').val(jsonObj.country);
        $('#update_country').trigger('change');

        // $('#update_state').val(jsonObj.state);
        // $('#update_state').trigger('change');    
        // $("#update_city").val(jsonObj.city);
        //$("#update_city").trigger('change');
        $("#update_postal_code").val(jsonObj.postal_code);

        // $.ajax({
        //     url: "{{ url('/get-states') }}",
        //     type: 'POST',
        //     data: {
        //         country_name: jsonObj.country
        //     },
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     },
        //     success: function(response) {
        //         response.forEach((value, index) => {
        //             $('#update_state').append(`<option value="` + value.name + `">` + value.name + `</option>`);
        //         });
        //         $('#update_state').val(jsonObj.state)
        //         updatedCity(jsonObj.state);
        //     },
        //     error: function(xhr, status, error) {
        //         console.log(xhr.responseText);
        //         alert(xhr.responseText)
        //     }
        // });


        // function updatedCity(value) {
        //     $.ajax({
        //         url: "{{ url('/get-cities') }}",
        //         type: 'POST',
        //         data: {
        //             state_name: value
        //         },
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         success: function(response) {
        //             response.forEach((value, index) => {
        //                 $('#update_city').append(`<option value="` + value.name + `">` + value.name + `</option>`);
        //             });
        //             $("#update_city").val(jsonObj.city);
        //         },
        //         error: function(xhr, status, error) {
        //             $('.loader').css('display', 'none');
        //             // Handle the error response
        //             console.log(xhr.responseText);
        //             alert(xhr.responseText)
        //         }
        //     });
        // }


    }

    $(document).ready(function() {
        $(this).scrollTop(0);
        $('#update_shipping').submit(function(event) {
            event.preventDefault();
            var id = localStorage.getItem('shipping_id');
            var form = $('#update_shipping')[0];
            var formData = new FormData(form);
            formData.append('id', id);

            var address = $("#update_address1").val();
            var update_city = $("#update_city").val();
            var update_state = $("#update_state").val();
            var update_country = $("#update_country").val();
            var update_postal_code = $("#update_postal_code").val();
            if (address == "" || address == "undefined") {
                displayError("Addess is required.");
                return;
            }

            // if (update_city == "" || update_city == "undefined") {
            //     displayError("City is required.");
            //     return;
            // }

            // if (update_state == "" || update_state == "undefined") {
            //     displayError("State is required.");
            //     return;
            // }

            // if (update_country == "" || update_country == "undefined") {
            //     displayError("Country is required.");
            //     return;
            // }

            if (update_postal_code == "" || update_postal_code == "undefined") {
                displayError("Postal code is required.");
                return;
            }

            $('.loader').css('display', 'block');
            $.ajax({
                url: "{{ route('update.shipping_address') }}",
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                },
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    $('.loader').css('display', 'none');
                    // Handle the success response
                    $("#success_shipping").text(response.message);

                    localStorage.removeItem("shipping_id");
                    localStorage.removeItem("shiiping_edit");

                    location.reload(true)
                },
                error: function(xhr, status, error) {
                    $('.loader').css('display', 'none');
                    // Handle the error response
                    console.log(xhr.responseText);
                    alert(xhr.responseText)
                }
            });
        });
    });

    function displayError(message) {
        $('#error_shipping').text(message);
    }

    var id;

    function removeShipping(id) {

        var dataToSend = {
            id: id,
        };

        // console.log(id);
        $('.loader').css('display', 'block');
        $.ajax({
            url: "{{ route('remove.shipping_address') }}",
            type: 'POST',
            data: dataToSend,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            // contentType: false,
            // processData: false,
            // dataType: 'json',
            success: function(response) {
                $('.loader').css('display', 'none');
                // Handle the success response
                $("#success_remove_shipping").text(response.message);
                //alert(response.message);
                setTimeout(function() {
                    location.reload(true);
                }, 1000);
            },
            error: function(xhr, status, error) {
                $('.loader').css('display', 'none');
                // Handle the error response
                console.log(xhr.responseText);
                alert(xhr.responseText)
            }
        });
    }

    $(document).ready(function() {

        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z," "]+$/i.test(value);
        }, "Letters only please");

        jQuery.validator.addMethod("zipcode", function(value, element) {
            return this.optional(element) || /\d{5}(?:-\d{2})?$/.test(value);
        }, "Please provide a valid zipcode.");

        $('#add-address').validate({
            rules: {
                "recipient_name": {
                    required: true,
                    lettersonly: true,
                    minlength: 2
                },
                "ship_address": {
                    required: true,
                },
                "postal_code": {
                    required: true,
                    zipcode: true,
                }
            },
            messages: {
                "recipient_name": {
                    minlength: "this field must contain at least {2} characters",
                }
            },
            submitHandler: function(form) { // for demo
                // alert('valid form');
                // return false;
                form.submit();
            }
        });
    });
</script>


@include('layouts.footer')