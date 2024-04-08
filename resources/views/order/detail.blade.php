@include('layouts.header')
<section class="order-details">
    <div class="container">
        <div class="order-details-main">
            <div class="hs-store-heading">
                <h1 class="common-heading">
                    Order Details
                </h1>
                <hr class="gray-line" />
            </div>
            <div class="order-details-main-inner">
                <div class="dashboard-order-details">
                    <div class="dashboard-orderdetails-content">
                        <div class="dashboard-order-details-content-grid">
                            <div class="dashboard-order-details-content-left">
                                <img src="{{asset($order->product_image)}}" alt="">
                            </div>
                            <div class="dashboard-order-details-content-right">
                                <p class="dashboard-product-name">
                                    {{$order->name}}
                                </p>
                                <p>
                                   <b>Additional Note -</b> 
                                   {{$order->additional_note}}
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
                                #{{$order->order_id}}
                            </p>
                        </div>
                        <div class="dashboard-order-details-rate-grid">
                            <p>
                                Order Date
                            </p>
                            <p class="dots">

                            </p>
                            <p>
                                {{ date('d M Y', strtotime($order->order_date)) }}
                            </p>
                        </div>
                        <!-- <div class="dashboard-order-details-rate-grid">
                            <p>
                                Delivery Date
                            </p>
                            <p class="dots">
                
                            </p>
                            <p>
                                30 July 2023
                            </p>
                        </div> -->
                        <div class="dashboard-order-details-rate-grid">
                            <p>
                                Payment Status
                            </p>
                            <p class="dots">

                            </p>
                            <p>
                                {{$order->payment_status}}
                            </p>
                        </div>
                        <div class="dashboard-order-details-rate-grid">
                            <p>
                                Quantity
                            </p>
                            <p class="dots">

                            </p>
                            <p>
                                {{$order->quantity}}
                            </p>
                        </div>
                        <!-- <div class="dashboard-order-details-rate-grid">
                            <p>
                                Shipping Charges
                            </p>
                            <p class="dots">

                            </p>
                            <p>
                                $100
                            </p>
                        </div> -->
                        <!-- <div class="dashboard-order-details-rate-grid">
                            <p>
                                Discount
                            </p>
                            <p class="dots">
                
                            </p>
                            <p>
                                $100
                            </p>
                        </div> -->
                        <div class="dashboard-order-details-rate-grid">
                            <p>
                                Total
                            </p>
                            <p class="dots">

                            </p>
                            <p>
                                ${{$order->amount * (int)$order->quantity}}
                            </p>
                        </div>
                    </div>
                    <div class="dashboard-order-details-address">
                        <p class="dashboard-order-details-address-heading">
                            Shipping Address
                        </p>
                        <div class="dashboard-user-address">
                            <p class="dashboard-user-addres-p">
                                {{ $order->address_line1 }} <br>
                                {{get_country_name($order->country)}}, {{get_state_name($order->state)}}<br>
                                {{get_city_name($order->city)}}, {{ $order->postal_code }} <br>
                            </p>
                        </div>
                    </div>

                    <div class="dashboard-order-details-address">
                        <p class="dashboard-order-details-address-heading">
                            Purchaser Details
                        </p>
                        <div class="dashboard-user-address">
                            <p class="dashboard-user-addres-p">
                                Name :  {{ $order->name }} <br>
                                Email address : {{ $order->email }}<br>
                                Phone number: {{ $order->mobile_number }} <br>
                                QR Display Option: {{ $order->qr_display_option }} <br>
                                QR Code Detail Link: <a href="http://innovativeheadstone.com/public/qr-detail-view/{{$order->qr_code_id}}">http://innovativeheadstone.com/public/qr-detail-view/{{$order->qr_code_id}}</a> <br>                  
                                Name on Order: {{ $order->name_on_order }} <br>
                                Company Name: {{ $order->company_name }} <br>
                                Inscription Type: {{ $order->inscription_type }} <br>
                                Cemetry Location Name: {{ $order->cemetry_location_name }} <br>
                                Cemetry Location Address: {{ $order->cemetry_location_address }} <br>
                                Cemetry Location Phone: {{ $order->cemetry_location_phone }} <br><br>
                                <p class="dashboard-order-details-address-heading">
                                    Inscription 1 Details
                                </p>
                                Endearment:  
                                    @if( $inscription_meta['endearment'] == "custom")
                                        {{ @$inscription_meta['customendearment'] }}
                                    @else
                                        {{ @$inscription_meta['endearment'] }}
                                    @endif
                                <br>
                                First Name: {{ @$inscription_meta['fname'] }} <br>
                                Last Name:  {{ @$inscription_meta['lname'] }} <br>
                                DOB:  {{ @$inscription_meta['dob'] }} <br>
                                DOD:  {{ @$inscription_meta['dod'] }} <br>
                                Epitaph:  
                                    @if( $inscription_meta['epitaph'] == "custom")
                                        {{ @$inscription_meta['ownepitaph'] }}
                                    @else
                                        {{ @$inscription_meta['epitaph'] }}
                                    @endif
                                <br><br>

                                <p class="dashboard-order-details-address-heading">
                                    Inscription 2 Details
                                </p>
                                Endearment: 
                                    @if($order->inscription2_endearment == "custom") 
                                        {{ $order->customendearment2 }} 
                                    @else  
                                        {{ $order->inscription2_endearment }} 
                                    @endif <br>
                                First Name: {{ $order->inscription2_firstname }} <br>
                                Middle Name: {{ $order->inscription2_middlename }} <br>
                                Last Name: {{ $order->inscription2_lastname }} <br>
                                DOB: {{ $order->inscription2_dob }} <br>
                                DOD: {{ $order->inscription2_dd }} <br>
                                Epitaph: 
                                @if($order->inscription2_epitaph == "custom")
                                    {{ $order->inscription2_emblem }}
                                @else
                                    {{ $order->inscription2_epitaph }}
                                @endif  <br>
                                Design Number: {{ $order->design_number }} <br>
                                Sanded Panel: {{ $order->sanded_panel }} <br>
                                Sanded Artwork: {{ $order->sanded_artwork }} <br>
                                Shape: {{ $order->shape }} <br>
                                Size: {{ $order->size }} <br>
                                Custom Shape Size: {{ $order->customshapesize }} <br>
                                Color: {{ $order->color }} <br>
                                Polish: {{ $order->polish }} <br>
                                Additional Polish Notes: {{ $order->polishnote }} <br>
                                Engraving Depth: {{ $order->engraving_depth }} <br>
                                Base Size: {{ $order->base_size }} <br>
                                Base size (Continued): {{ $order->base_size_continued }} <br><br>

                                <p class="dashboard-order-details-address-heading">
                                    Photo (ceramic embed) 1 Details
                                </p>
                                Shape: {{ $order->photo_shape }} <br>
                                Size: {{ $order->photo_size }} <br>
                                Color: {{ $order->photo_color }} <br>
                                Cropping: {{ $order->photo_cropping }} <br>
                                Background: {{ $order->photo_background }} <br>
                                Base color: 
                                    @if($order->basecolor == "See Additional Instructions")
                                        {{ $order->basecolor_additional_note }} 
                                    @else
                                        {{ $order->basecolor }} 
                                    @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.footer')